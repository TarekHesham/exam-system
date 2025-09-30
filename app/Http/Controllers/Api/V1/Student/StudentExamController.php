<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubmitExamRequest;
use App\Core\Services\{StudentExamService, ExamService, ExamSessionService};
use App\Modules\ExamManagement\Models\ExamSession;
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Support\Facades\{Auth, Cache};
use Carbon\Carbon;

class StudentExamController extends Controller
{
    public function __construct(
        private StudentExamService $studentExamService,
        private ExamService $examService,
        private ExamSessionService $sessionService
    ) {
        // 
    }

    /**
     * Student gets available exam if session exists
     * Student can only start exam during exam time window
     */
    public function getAvailableExam(): JsonResponse
    {
        try {
            // Find not_started session for this student
            $student = Auth::user()->student;
            $studentSession = $this->sessionService->getSessionByStudentId($student->id);
            if (! $studentSession) {
                return $this->errorResponse('غير مسموح لك بدخول الامتحان حتى يسمح لك المراقب.', 400);
            }

            // Check if exam has started (student can only start during exam time)
            $now = Carbon::now();
            $examStartTime = $studentSession->exam->start_time;
            $examEndTime   = $studentSession->exam->end_time;
            if ($now < $examStartTime) {
                $minutesUntilStart = $now->diffInMinutes($examStartTime);
                return $this->errorResponse("لم يحن وقت الامتحان بعد. يبدأ الامتحان خلال {$minutesUntilStart} دقيقة", 400);
            }

            // Validate session is still valid
            if (! $this->isSessionStillValid($studentSession)) {
                $studentSession->update(['session_status' => 'expired']);
                return $this->errorResponse('انتهت صلاحية الجلسة. اطلب من المراقب إعادة المسح.', 400);
            }

            // Calculate actual time remaining for student
            $timeRemainingMinutes = $this->calculateStudentTimeRemaining($studentSession);
            if ($timeRemainingMinutes <= 0) {
                $studentSession->update(['session_status' => 'expired']);
                return $this->errorResponse('انتهى وقت الامتحان', 400);
            }

            // Get cached exam data
            $examData = $this->examService->getCachedExamForStudent($studentSession->exam_id);

            // Update session to in_progress
            $studentSession->update([
                'session_status' => 'in_progress',
                'started_at'     => Carbon::now()
            ]);

            // Cache session data for performance
            $this->cacheStudentSession($studentSession);

            return $this->successResponse([
                ...$examData,
                'timing_info' => [
                    'start_time'             => $examStartTime,
                    'end_time'               => $examEndTime,
                    'duration_minutes'       => $studentSession->exam->duration_minutes,
                    'time_remaining_minutes' => $timeRemainingMinutes,
                ]
            ], 'تم جلب الامتحان المتاح بنجاح');
        } catch (\Exception $e) {
            return $this->errorResponse($e->getMessage(), 500);
        }
    }

    /**
     * Submit complete exam with all answers at once
     * @param Request $request
     */
    public function submitExam(SubmitExamRequest $request): JsonResponse
    {
        try {
            $data    = $request->validated();
            $student = Auth::user()->student;

            // Get active session
            $session = ExamSession::where('student_id', $student->id)
                ->where('session_status', 'in_progress')
                ->first();

            if (! $session) {
                return response()->json([
                    'status' => false,
                    'message' => 'لا توجد جلسة نشطة'
                ], 400);
            }

            // Submit the session
            $res = $this->sessionService->submitSession($session, $data);

            return $this->successResponse($res, 'تم تسليم الامتحان بنجاح');
        } catch (\Exception $e) {
            logger()->error($e->getMessage());
            return $this->errorResponse('حدث خطأ أثناء تسليم الامتحان', 500);
        }
    }

    /**
     * Calculate remaining time for student considering late entry
     */
    private function calculateStudentTimeRemaining(ExamSession $session): int
    {
        $exam = $session->exam;
        $now = Carbon::now();
        $examEndTime = Carbon::parse($exam->end_time);

        // Time until exam officially ends
        $timeUntilExamEnd = $now->diffInMinutes($examEndTime, false);

        // If exam has ended, no time remaining
        if ($timeUntilExamEnd <= 0) {
            return 0;
        }

        // Full exam duration from now
        $fullDurationFromNow = $exam->duration_minutes;

        // Student gets the minimum of: remaining exam time OR full duration
        return min($timeUntilExamEnd, $fullDurationFromNow);
    }

    /**
     * Check if session is still valid for student to start exam
     * Session valid until exam ends or 30 minutes after creation (whichever is sooner)
     */
    private function isSessionStillValid(ExamSession $session): bool
    {
        $exam = $session->exam;
        $now = Carbon::now();

        // Session expires when exam ends
        if ($now > $exam->end_time) {
            return false;
        }

        // Session expires 30 minutes after creation if exam hasn't started yet
        $sessionCreatedAt = $session->created_at;
        if ($now < $exam->start_time && $sessionCreatedAt->diffInMinutes($now) > 30) {
            return false;
        }

        // Once exam starts, session stays valid until exam ends
        return true;
    }

    /**
     * Cache student session for quick access
     */
    private function cacheStudentSession(ExamSession $session): void
    {
        $cacheKey = "student_session_{$session->student_id}";
        $cacheData = [
            'session_id' => $session->id,
            'exam_id' => $session->exam_id,
            'student_id' => $session->student_id,
            'session_token' => $session->session_token,
            'started_at' => $session->started_at,
            'duration_minutes' => $session->exam->duration_minutes,
            'last_heartbeat' => Carbon::now()
        ];

        Cache::put($cacheKey, $cacheData, $session->exam->duration_minutes * 60 + 300);
    }

    public function myExamResults()
    {
        $student = Auth::user()->student;

        $results = $student->examResults()
            ->with(['exam.subject'])
            ->whereHas('exam', fn($q) => $q->where('academic_year', $student->academic_year))
            ->get();

        return $this->successResponse($results);
    }
}
