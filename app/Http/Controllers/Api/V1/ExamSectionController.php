<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\Contracts\Services\ExamSectionServiceInterface;
use App\Core\DTOs\ExamSectionDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\{
    StoreExamSectionRequest,
    UpdateExamSectionRequest
};
use App\Http\Resources\ExamSectionResource;
use Illuminate\Http\Request;

class ExamSectionController extends Controller
{
    public function __construct(
        protected ExamSectionServiceInterface $service
    ) {}

    public function index(Request $request)
    {
        $perPage = $request->get('per_page', 10);
        $sections = $this->service->list($perPage);
        return $this->successResponsePaginate(
            ExamSectionResource::collection($sections),
            $sections,
            'Exam Sections'
        );
    }

    public function show($id)
    {
        $section = $this->service->get($id);
        if (!$section) {
            return $this->errorResponse('Exam Section not found', 404);
        }
        return $this->successResponse(
            ExamSectionResource::make($section),
            'Exam Section details'
        );
    }

    public function store(StoreExamSectionRequest $request)
    {
        $dto = ExamSectionDTO::fromArray($request->validated());
        $section = $this->service->create($dto);
        return $this->successResponse($section, 'Exam Section created successfully');
    }

    public function update(UpdateExamSectionRequest $request, $id)
    {
        $dto = ExamSectionDTO::fromArray($request->validated());
        $section = $this->service->update($id, $dto);
        if (!$section) {
            return $this->errorResponse('Exam Section not found', 404);
        }
        return $this->successResponse($section, 'Exam Section updated successfully');
    }

    public function destroy($id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) {
            return $this->errorResponse('Exam Section not found', 404);
        }
        return $this->successResponse([], 'Exam Section deleted successfully');
    }
}
