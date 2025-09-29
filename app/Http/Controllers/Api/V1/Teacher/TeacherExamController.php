<?php

namespace App\Http\Controllers\Api\V1\Teacher;

use App\Http\Controllers\Controller;
use App\Core\Services\{ExamSessionService, StudentExamService};
use App\Exceptions\ExamAccessDeniedException;
use App\Modules\ExamManagement\Models\Exam;
use App\Modules\UserManagement\Models\Student;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\{Auth, Validator};
use Carbon\Carbon;

class TeacherExamController extends Controller
{
    public function __construct(
        private ExamSessionService $sessionService,
        private StudentExamService $studentExamService
    ) {
        // 
    }

    /**
     * Teacher scans QR code with student_id and creates session
     */
    public function scanQRAndCreateSession(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'student_id'    => 'required|integer|exists:students,id',
            'device_info'   => 'sometimes|array',
            'battery_level' => 'sometimes|integer|min:0|max:100',
            'location'      => 'sometimes|array'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 422);
        }

        try {
            // Get teacher info
            $teacher = Auth::user()->teacher;

            // Find available exam for the student
            $availableExam = $this->findAvailableExamForStudent($request->student_id);
            if (! $availableExam) {
                return response()->json([
                    'status' => false,
                    'message' => 'لا يوجد امتحان متاح للطالب في الوقت الحالي'
                ], 400);
            }

            // Create session for the student
            $session = $this->sessionService->createSessionByTeacher(
                $availableExam->id,
                $request->student_id,
                $teacher->id,
                $request->all()
            );

            return response()->json([
                'status' => true,
                'message' => 'تم السماح للطالب بدخول الامتحان',
                'data' => [
                    'session_id'    => $session->id,
                    'student_name'  => $session->student->user->name,
                    'exam_title'    => $session->exam->title,
                    'exam_duration' => $session->exam->duration_minutes,
                    'created_at'    => $session->created_at
                ]
            ]);
        } catch (ExamAccessDeniedException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
                'reasons' => $e->getReasons()
            ], 403);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Find available exam for student based on their academic info
     * Teacher can create session from 2 hours before exam start until exam end
     */
    private function findAvailableExamForStudent(int $studentId): ?Exam
    {
        $student = Student::with(['user', 'school'])->find($studentId);

        if (! $student) {
            return null;
        }

        $now = Carbon::now();

        return Exam::query()
            ->where('is_published', true)
            ->where('is_active', true)
            ->where('academic_year', $student->academic_year)
            ->whereHas('subject', function ($query) use ($student) {
                $query->where(function ($q) use ($student) {
                    $q->where('section', $student->section)
                        ->orWhere('section', 'common');
                });
            })
            // Teacher window: 30 before exam start until exam end
            ->where('start_time', '>=', $now->copy()->subMinutes(30))
            ->where('end_time', '>=', $now)
            // Student shouldn't have existing active session
            ->whereDoesntHave('sessions', function ($query) use ($studentId) {
                $query->where('student_id', $studentId)
                    ->whereIn('session_status', ['submitted', 'in_progress', 'not_started']);
            })
            ->with(['subject', 'questions'])
            ->orderBy('start_time', 'asc')
            ->first();
    }
}
