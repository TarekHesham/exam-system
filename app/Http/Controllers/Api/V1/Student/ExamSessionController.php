<?php

namespace App\Http\Controllers\Api\V1\Student;

use App\Http\Controllers\Controller;
use App\Core\Services\{ExamService, ExamSessionService};
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\{Auth, Validator};
use Carbon\Carbon;

class ExamSessionController extends Controller
{
    public function __construct(
        private ExamSessionService $sessionService,
        private ExamService $examService
    ) {}

    public function startSession(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'device_info'   => 'sometimes|array',
            'battery_level' => 'sometimes|integer|min:0|max:100',
            'location'      => 'sometimes|array'
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
            $session = $this->sessionService->startSession(
                $request->exam_id,
                $student->id,
                $request->all()
            );

            return response()->json([
                'status' => true,
                'message' => 'تم بدء الامتحان بنجاح',
                'data' => [
                    'session_id' => $session->id,
                    'session_token' => $session->session_token,
                    'exam' => $session->exam,
                    'time_remaining' => $session->time_remaining_minutes,
                    'can_pause' => $session->exam->allow_pause ?? false
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function submitSession(Request $request, string $sessionId): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'final_answers' => 'sometimes|array',
                'submit_confirmation' => 'required|boolean|accepted'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'يجب تأكيد إرسال الامتحان',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $session = $this->sessionService->getSession($sessionId);
            $this->authorizeSession($session);

            $result = $this->sessionService->submitSession($session, $request->all());

            return response()->json([
                'status' => true,
                'message' => 'تم إرسال الامتحان بنجاح',
                'data' => [
                    'session_id' => $session->id,
                    'submitted_at' => $session->submitted_at,
                    'total_questions' => $result['total_questions'],
                    'answered_questions' => $result['answered_questions'],
                    'preliminary_score' => $result['preliminary_score'] ?? null,
                    'needs_manual_correction' => $result['needs_manual_correction'],
                    'result_available_at' => $result['result_available_at']
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function timeRemaining(string $sessionId): JsonResponse
    {
        try {
            $session = $this->sessionService->getSession($sessionId);
            $this->authorizeSession($session);

            $timeData = $this->sessionService->getTimeRemaining($session);

            return response()->json([
                'status' => true,
                'data' => $timeData
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function heartbeat(Request $request, string $sessionId): JsonResponse
    {
        try {
            $session = $this->sessionService->getSession($sessionId);
            $this->authorizeSession($session);

            $this->sessionService->updateHeartbeat($session, [
                'battery_level' => $request->battery_level,
                'connection_status' => $request->connection_status,
                'active_apps' => $request->active_apps ?? []
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Heartbeat received',
                'data' => [
                    'server_time' => Carbon::now(),
                    'session_active' => true,
                    'time_remaining' => $session->time_remaining_minutes
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 400);
        }
    }

    private function authorizeSession($session): void
    {
        $currentStudent = Auth::user()->student;
        if ($session->student_id !== $currentStudent->id) {
            throw new \Exception('غير مصرح لك بالوصول لهذه الجلسة');
        }
    }
}
