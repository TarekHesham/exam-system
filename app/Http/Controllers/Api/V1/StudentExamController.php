<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Core\Services\{StudentExamService, ExamService};
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\Auth;

class StudentExamController extends Controller
{
    public function __construct(
        private StudentExamService $studentExamService,
        private ExamService $examService
    ) {}

    public function availableExams(): JsonResponse
    {
        $student = Auth::user()->student;
        $exams = $this->studentExamService->getAvailableExams($student->id);

        return response()->json([
            'status' => 'success',
            'message' => 'تم جلب الامتحانات المتاحة بنجاح',
            'data' => $exams
        ]);
    }

    public function checkAccess(Request $request, int $examId): JsonResponse
    {
        $student = Auth::user()->student;

        try {
            $accessCheck = $this->studentExamService->checkExamAccess($examId, $student->id, [
                'device_info'   => $request->device_info,
                'battery_level' => $request->battery_level,
                'location'      => $request->location
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'تم فحص إمكانية الدخول',
                'data' => $accessCheck
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function generateQR(Request $request, int $examId): JsonResponse
    {
        $student = Auth::user()->student;

        try {
            $qrCode = $this->studentExamService->generateEntryQR($examId, $student->id);

            return response()->json([
                'status' => 'success',
                'message' => 'تم توليد رمز الدخول بنجاح',
                'data' => [
                    'qr_code'    => $qrCode->qr_code,
                    'expires_at' => $qrCode->expires_at,
                    'valid_for_minutes' => 5
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
