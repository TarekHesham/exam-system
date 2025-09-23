<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\Contracts\Services\SubjectServiceInterface;
use App\Core\DTOs\SubjectDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function __construct(
        protected SubjectServiceInterface $service
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = $this->service->paginate();
        return $this->successResponse($subjects, 'Subjects retrieved successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dto = new SubjectDTO(...$request->validated());
        $subject = $this->service->store($dto);
        return $this->successResponse($subject, 'Subject created successfully', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = $this->service->find($id);
        if (!$subject) {
            return $this->errorResponse('Subject not found', 404);
        }
        return $this->successResponse($subject, 'Subject retrieved successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dto = new SubjectDTO(
            $request->input('name', ''),
            $request->input('code', ''),
            $request->input('section'),
            $request->input('duration_minutes', 0),
            $request->input('max_score', 0),
            $request->boolean('has_essay_questions'),
            $request->boolean('is_active')
        );
        $subject = $this->service->update($id, $dto);
        if (!$subject) {
            return $this->errorResponse('Subject not found', 404);
        }
        return $this->successResponse($subject, 'Subject updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) {
            return $this->errorResponse('Subject not found', 404);
        }
        return $this->successResponse([], 'Subject deleted successfully');
    }
}
