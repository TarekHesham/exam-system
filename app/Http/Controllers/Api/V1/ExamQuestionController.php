<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\Contracts\Services\ExamQuestionServiceInterface;
use App\Core\DTOs\ExamQuestionData;
use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreExamQuestionRequest, UpdateExamQuestionRequest};
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExamQuestionController extends Controller
{
    public function __construct(
        private ExamQuestionServiceInterface $service
    ) {
        //
    }

    /**
     * Display a paginated listing of exam questions.
     */
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->query('per_page', 15);
        $examId = $request->query('exam_id');

        if ($examId) {
            $paginator = $this->service->listByExam((int) $examId, $perPage);
        } else {
            $paginator = $this->service->list($perPage);
        }

        return $this->successResponse($paginator, 'Questions retrieved successfully');
    }

    /**
     * Store a newly created exam question.
     */
    public function store(StoreExamQuestionRequest $request): JsonResponse
    {
        $dto = ExamQuestionData::fromArray($request->validated());
        $question = $this->service->create($dto);

        return $this->successResponse($question, 'Question created', 201);
    }

    /**
     * Display the specified exam question.
     */
    public function show(int $id): JsonResponse
    {
        $question = $this->service->get($id);

        if (! $question) {
            return $this->errorResponse('Question not found', 404);
        }

        return $this->successResponse($question, 'Question retrieved');
    }

    /**
     * Update the specified exam question in storage.
     */
    public function update(UpdateExamQuestionRequest $request, int $id): JsonResponse
    {
        $dto = ExamQuestionData::fromArray($request->validated());
        $updated = $this->service->update($id, $dto);

        if (! $updated) {
            return $this->errorResponse('Question not found or could not be updated', 404);
        }

        return $this->successResponse($updated, 'Question updated successfully');
    }

    /**
     * Remove the specified exam question from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $deleted = $this->service->delete($id);

        if (! $deleted) {
            return $this->errorResponse('Question not found or could not be deleted', 404);
        }

        return $this->successResponse([], 'Question deleted successfully', 200);
    }
}
