<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\DTOs\CreateExamDTO;
use App\Core\DTOs\ExamFilterDTO;
use App\Core\DTOs\UpdateExamDTO;
use App\Http\Controllers\Controller;
use App\Core\Services\ExamService;
use App\Http\Requests\Exam\CreateExamRequest;
use App\Http\Requests\Exam\UpdateExamRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\{Auth, DB};

class ExamController extends Controller
{
    public function __construct(
        private ExamService $examService
    ) {
        //
    }

    public function index(Request $request): JsonResponse
    {
        $filters = ExamFilterDTO::fromRequest($request->all());
        $exams = $this->examService->getExams($filters);

        return response()->json([
            'status' => true,
            'message' => 'تم جلب قائمة الامتحانات بنجاح',
            'data' => $exams
        ]);
    }

    public function store(CreateExamRequest $request): JsonResponse
    {
        $dto = CreateExamDTO::fromArray($request->validated());
        $exam = $this->examService->createExam($dto);

        return response()->json([
            'status' => true,
            'message' => 'تم إنشاء الامتحان بنجاح',
            'data' => $exam->load(['creator'])
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $exam = $this->examService->getExamWithDetails($id);

        return response()->json([
            'status' => true,
            'message' => 'تم جلب تفاصيل الامتحان بنجاح',
            'data' => $exam
        ]);
    }

    public function update(UpdateExamRequest $request, int $id): JsonResponse
    {
        $dto = UpdateExamDTO::fromArray($request->validated());
        $exam = $this->examService->updateExam($id, $dto);

        return response()->json([
            'status' => true,
            'message' => 'تم تحديث الامتحان بنجاح',
            'data' => $exam->load(['creator'])
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $this->examService->deleteExam($id);

        return response()->json([
            'status' => true,
            'message' => 'تم حذف الامتحان بنجاح'
        ]);
    }

    public function publish(int $id): JsonResponse
    {
        $exam = $this->examService->publishExam($id);

        return response()->json([
            'status' => true,
            'message' => 'تم نشر الامتحان بنجاح',
            'data' => $exam
        ]);
    }

    public function unpublish(int $id): JsonResponse
    {
        $exam = $this->examService->unpublishExam($id);

        return response()->json([
            'status' => true,
            'message' => 'تم إلغاء نشر الامتحان بنجاح',
            'data' => $exam
        ]);
    }

    public function activate(int $id): JsonResponse
    {
        $exam = $this->examService->activateExam($id);

        return response()->json([
            'status' => true,
            'message' => 'تم تفعيل الامتحان بنجاح',
            'data' => $exam
        ]);
    }

    public function deactivate(int $id): JsonResponse
    {
        $exam = $this->examService->deactivateExam($id);

        return response()->json([
            'status' => true,
            'message' => 'تم إلغاء تفعيل الامتحان بنجاح',
            'data' => $exam
        ]);
    }

    public function duplicate(Request $request, int $id): JsonResponse
    {
        $modifications = $request->only([
            'title',
            'description',
            'exam_type',
            'academic_year',
            'start_time',
            'end_time'
        ]);

        $exam = $this->examService->duplicateExam($id, $modifications);

        return response()->json([
            'status' => true,
            'message' => 'تم نسخ الامتحان بنجاح',
            'data' => $exam->load(['creator', 'questions'])
        ], 201);
    }

    public function statistics(int $id): JsonResponse
    {
        $statistics = $this->examService->getExamStatistics($id);

        return response()->json([
            'status' => true,
            'message' => 'تم جلب إحصائيات الامتحان بنجاح',
            'data' => $statistics
        ]);
    }

    public function upcoming(): JsonResponse
    {
        $exams = $this->examService->getUpcomingExams();

        return response()->json([
            'status' => true,
            'message' => 'تم جلب الامتحانات القادمة بنجاح',
            'data' => $exams
        ]);
    }

    public function ongoing(): JsonResponse
    {
        $exams = $this->examService->getOngoingExams();

        return response()->json([
            'status' => true,
            'message' => 'تم جلب الامتحانات الجارية بنجاح',
            'data' => $exams
        ]);
    }

    public function completed(): JsonResponse
    {
        $exams = $this->examService->getCompletedExams();

        return response()->json([
            'status' => true,
            'message' => 'تم جلب الامتحانات المكتملة بنجاح',
            'data' => $exams
        ]);
    }

    public function checkAccess(Request $request, int $id): JsonResponse
    {
        $studentId = $request->input('student_id') ?? Auth::user()->student->id;
        $canAccess = $this->examService->canStudentAccessExam($id, $studentId);

        return response()->json([
            'status' => true,
            'message' => 'تم فحص صلاحية الوصول للامتحان',
            'data' => [
                'can_access' => $canAccess,
                'exam_id' => $id,
                'student_id' => $studentId
            ]
        ]);
    }
}
