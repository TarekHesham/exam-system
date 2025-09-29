<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Core\Repositories\TeacherRepository;
use App\Http\Requests\{
    AssignTeacherToSchoolsRequest,
    StoreTeacherSchoolAssignmentRequest,
    UpdateTeacherSchoolAssignmentRequest
};
use App\Http\Resources\TeacherSchoolAssignmentResource;

class TeacherSchoolAssignmentController extends Controller
{
    public function __construct(
        protected TeacherRepository $repo
    ) {
        // 
    }

    public function index()
    {
        $data = $this->repo->all();
        return $this->successResponsePaginate(
            TeacherSchoolAssignmentResource::collection($data),
            $data,
            'Assignments fetched successfully'
        );
    }

    /**
     * Get teachers by school
     */
    public function getBySchool(int $schoolId)
    {
        $data = $this->repo->getBySchool($schoolId);
        return $this->successResponsePaginate($data, $data, 'Teachers fetched successfully');
    }

    public function show($id)
    {
        $assignment = $this->repo->find($id);

        return $assignment
            ? $this->successResponse($assignment, 'Assignment fetched successfully')
            : $this->errorResponse('Assignment not found');
    }

    public function store(StoreTeacherSchoolAssignmentRequest $request)
    {
        $assignment = $this->repo->assignToSchool($request->validated());
        return $this->successResponse(TeacherSchoolAssignmentResource::make($assignment), 'Assignment created successfully', 201);
    }

    public function assignToSchools(AssignTeacherToSchoolsRequest $request, int $teacherId)
    {
        $validated = $request->validated();

        $this->repo->assignToSchools(
            $teacherId,
            $validated['school_ids'],
            $validated['assignment_type'] ?? 'teaching'
        );

        return $this->successResponse([], 'Teacher assigned to schools successfully');
    }

    public function update(UpdateTeacherSchoolAssignmentRequest $request, $id)
    {
        $assignment = $this->repo->update($id, $request->validated());

        return $assignment
            ? $this->successResponse($assignment, 'Assignment updated successfully')
            : $this->errorResponse('Assignment not found');
    }

    public function destroy($id)
    {
        return $this->repo->delete($id)
            ? $this->successResponse([], 'Deleted successfully')
            : $this->errorResponse('Assignment not found');
    }
}
