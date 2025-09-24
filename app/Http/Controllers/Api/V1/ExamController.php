<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\Contracts\Services\ExamServiceInterface;
use App\Http\Controllers\Controller;
use App\Core\DTOs\{CreateExamDTO, ExamFilterDTO, UpdateExamDTO};
use App\Http\Requests\{CreateExamRequest, UpdateExamRequest};
use App\Http\Resources\ExamResource;
use App\Modules\ExamManagement\Models\Exam;
use Exception;
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

class ExamController extends Controller
{
    public function __construct(
        private ExamServiceInterface $examService
    ) {
        //
    }

    public function index(Request $request): JsonResponse
    {
        $filters = ExamFilterDTO::fromRequest($request->all());
        $exams = $this->examService->getExams($filters);

        return $this->successResponsePaginate(
            ExamResource::collection($exams),
            $exams,
            'تم جلب الامتحانات بنجاح'
        );
    }

    public function store(CreateExamRequest $request)
    {
        try {
            $dto = CreateExamDTO::fromRequest($request);
            $exam = $this->examService->createExam($dto);

            return response()->json([
                'success' => true,
                'message' => 'تم إنشاء الامتحان بنجاح',
                'data' => $exam->load(['subject', 'creator'])
            ], 201);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        } catch (Exception $e) {
            logger($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء إنشاء الامتحان'
            ], 500);
        }
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

    public function update(UpdateExamRequest $request, Exam $exam)
    {
        try {
            if (!$exam) {
                return $this->errorResponse('الامتحان غير موجود');
            }

            $dto = UpdateExamDTO::fromRequest($request);
            $this->examService->updateExam($exam->id, $dto);

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث الامتحان بنجاح'
            ]);
        } catch (InvalidArgumentException $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء تحديث الامتحان'
            ], 500);
        }
    }

    public function destroy(int $id): JsonResponse
    {
        $this->examService->deleteExam($id);

        return response()->json([
            'status' => true,
            'message' => 'تم حذف الامتحان بنجاح'
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
