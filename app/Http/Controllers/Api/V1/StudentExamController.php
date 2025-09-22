<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Core\Services\{StudentExamService, ExamService, ExamSessionService};
use App\Modules\ExamManagement\Models\ExamSession;
use Carbon\Carbon;
use Illuminate\Http\{JsonResponse, Request};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class StudentExamController extends Controller
{
    public function __construct(
        private StudentExamService $studentExamService,
        private ExamService $examService,
        private ExamSessionService $sessionService
    ) {}

    /**
     * Student gets available exam if session exists
     * Student can only start exam during exam time window
     */
    public function getAvailableExam(): JsonResponse
    {
        try {
            $student = Auth::user()->student;

            // Find not_started session for this student
            $studentSession = ExamSession::where('student_id', $student->id)
                ->where('session_status', 'not_started')
                ->with(['exam.subject', 'exam.questions'])
                ->first();

            if (!$studentSession) {
                return response()->json([
                    'status' => false,
                    'message' => 'غير مسموح لك بدخول الامتحان حتى يسمح لك المراقب.'
                ], 400);
            }

            // Check if exam has started (student can only start during exam time)
            $now = Carbon::now();
            $examStartTime = $studentSession->exam->start_time;
            $examEndTime = $studentSession->exam->end_time;

            if ($now < $examStartTime) {
                $minutesUntilStart = $now->diffInMinutes($examStartTime);
                return response()->json([
                    'status' => false,
                    'message' => "لم يحن وقت الامتحان بعد. يبدأ الامتحان خلال {$minutesUntilStart} دقيقة",
                    'data' => [
                        'exam_title' => $studentSession->exam->title,
                        'start_time' => $examStartTime,
                        'minutes_until_start' => $minutesUntilStart
                    ]
                ], 400);
            }

            // Validate session is still valid
            if (!$this->isSessionStillValid($studentSession)) {
                $studentSession->update(['session_status' => 'expired']);

                return response()->json([
                    'status' => false,
                    'message' => 'انتهت صلاحية الجلسة. اطلب من المراقب إعادة المسح.'
                ], 400);
            }

            // Calculate actual time remaining for student
            $timeRemainingMinutes = $this->calculateStudentTimeRemaining($studentSession);

            if ($timeRemainingMinutes <= 0) {
                $studentSession->update(['session_status' => 'expired']);
                return response()->json([
                    'status' => false,
                    'message' => 'انتهى وقت الامتحان'
                ], 400);
            }

            // Get cached exam data
            $examData = $this->examService->getCachedExamForStudent($studentSession->exam_id);

            // Update session to in_progress
            $studentSession->update([
                'session_status' => 'in_progress',
                'started_at' => Carbon::now()
            ]);

            // Cache session data for performance
            $this->cacheStudentSession($studentSession);

            return response()->json([
                'status' => true,
                'message' => 'تم جلب الامتحان المتاح بنجاح',
                'data' => [
                    'exam' => $examData,
                    'session_id' => $studentSession->id,
                    'session_token' => $studentSession->session_token,
                    'can_pause' => $studentSession->exam->allow_pause ?? false,
                    'requirements' => [
                        'minimum_battery' => $studentSession->exam->minimum_battery_percentage,
                        'video_recording' => $studentSession->exam->require_video_recording,
                    ],
                    'timing_info' => [
                        'exam_start_time' => $examStartTime,
                        'exam_end_time' => $examEndTime,
                        'student_start_time' => Carbon::now(),
                        'duration_minutes' => $studentSession->exam->duration_minutes,
                        'time_remaining_minutes' => $timeRemainingMinutes,
                    ]
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء جلب الامتحان: ' . $e->getMessage()
            ], 500);
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

    /**
     * Save student answer for a question
     */
    public function saveAnswer(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'question_id' => 'required|integer|exists:exam_questions,id',
            'answer_text' => 'nullable|string',
            'answer_image' => 'nullable|string',
            'answer_data' => 'nullable|array',
            'time_spent_seconds' => 'nullable|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'بيانات غير صحيحة',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $student = Auth::user()->student;

            // Get active session
            $session = ExamSession::where('student_id', $student->id)
                ->where('session_status', 'in_progress')
                ->first();

            if (!$session) {
                return response()->json([
                    'status' => false,
                    'message' => 'لا توجد جلسة نشطة'
                ], 400);
            }

            // Use existing service method
            $answer = $this->sessionService->saveAnswer($session, $request->question_id, $request->all());

            return response()->json([
                'status' => true,
                'message' => 'تم حفظ الإجابة بنجاح',
                'data' => [
                    'answer_id' => $answer->id,
                    'question_id' => $answer->question_id,
                    'saved_at' => $answer->answered_at
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء حفظ الإجابة: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Save all student answers at once (batch submission)
     */
    public function saveAllAnswers(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'answers' => 'required|array|min:1',
            'answers.*.question_id' => 'required|integer|exists:exam_questions,id',
            'answers.*.answer_text' => 'nullable|string',
            'answers.*.answer_image' => 'nullable|string',
            'answers.*.answer_data' => 'nullable|array',
            'answers.*.time_spent_seconds' => 'nullable|integer|min:0',
            'notes' => 'nullable|string|max:500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'بيانات غير صحيحة',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $student = Auth::user()->student;

            // Get active session
            $session = ExamSession::where('student_id', $student->id)
                ->where('session_status', 'in_progress')
                ->first();

            if (!$session) {
                return response()->json([
                    'status' => false,
                    'message' => 'لا توجد جلسة نشطة'
                ], 400);
            }

            // Save all answers in batch
            $savedAnswers = $this->sessionService->saveAllAnswers($session, $request->answers);

            return response()->json([
                'status' => true,
                'message' => 'تم حفظ جميع الإجابات بنجاح',
                'data' => [
                    'session_id' => $session->id,
                    'total_answers_saved' => count($savedAnswers),
                    'answers' => $savedAnswers->map(function ($answer) {
                        return [
                            'answer_id' => $answer->id,
                            'question_id' => $answer->question_id,
                            'saved_at' => $answer->answered_at
                        ];
                    }),
                    'saved_at' => Carbon::now()
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء حفظ الإجابات: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Submit complete exam with all answers at once
     */
    public function submitExam(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'answers' => 'required|array|min:1',
            'answers.*.question_id' => 'required|integer|exists:exam_questions,id',
            'answers.*.answer_text' => 'nullable|string',
            'answers.*.answer_image' => 'nullable|string',
            'answers.*.answer_data' => 'nullable|array',
            'answers.*.time_spent_seconds' => 'nullable|integer|min:0',
            'notes' => 'nullable|string|max:500'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'بيانات غير صحيحة',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $student = Auth::user()->student;

            // Get active session
            $session = ExamSession::where('student_id', $student->id)
                ->where('session_status', 'in_progress')
                ->first();

            if (!$session) {
                return response()->json([
                    'status' => false,
                    'message' => 'لا توجد جلسة نشطة'
                ], 400);
            }

            // Save all answers first, then submit
            $savedAnswers = $this->sessionService->saveAllAnswers($session, $request->answers);

            // Submit the session
            $result = $this->sessionService->submitSession($session, [
                'notes' => $request->notes ?? null
            ]);

            return response()->json([
                'status' => true,
                'message' => 'تم تسليم الامتحان بنجاح',
                'data' => [
                    'session_id' => $result['session_id'],
                    'total_questions' => $result['total_questions'],
                    'answered_questions' => $result['answered_questions'],
                    'saved_answers_count' => $savedAnswers->count(),
                    'preliminary_score' => $result['preliminary_score'],
                    'needs_manual_correction' => $result['needs_manual_correction'],
                    'submission_time' => Carbon::now(),
                    'result_id' => $result['result_id']
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء تسليم الامتحان: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Send heartbeat to keep session alive
     */
    public function sendHeartbeat(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'battery_level' => 'nullable|integer|min:0|max:100',
            'connection_status' => 'nullable|string|in:stable,unstable,reconnected',
            'active_apps' => 'nullable|array'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'بيانات غير صحيحة',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $student = Auth::user()->student;

            // Get active session
            $session = ExamSession::where('student_id', $student->id)
                ->where('session_status', 'in_progress')
                ->first();

            if (!$session) {
                return response()->json([
                    'status' => false,
                    'message' => 'لا توجد جلسة نشطة'
                ], 400);
            }

            // Update heartbeat
            $this->sessionService->updateHeartbeat($session, $request->all());

            // Get remaining time
            $timeInfo = $this->sessionService->getTimeRemaining($session);

            return response()->json([
                'status' => true,
                'message' => 'تم تحديث الحالة بنجاح',
                'data' => [
                    'time_remaining_minutes' => $timeInfo['time_remaining_minutes'],
                    'time_remaining_seconds' => $timeInfo['time_remaining_seconds'],
                    'is_expired' => $timeInfo['is_expired'],
                    'warning_threshold' => $timeInfo['warning_threshold']
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'حدث خطأ أثناء تحديث الحالة: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Format time remaining for display
     */
    private function formatTimeRemaining(int $minutes): string
    {
        if ($minutes <= 0) {
            return 'انتهى الوقت';
        }

        $hours = intval($minutes / 60);
        $remainingMinutes = $minutes % 60;

        if ($hours > 0) {
            return "{$hours} ساعة و {$remainingMinutes} دقيقة";
        }

        return "{$remainingMinutes} دقيقة";
    }
}
