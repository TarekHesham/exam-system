<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\{StoreSchoolRequest, UpdateSchoolRequest};
use App\Core\Contracts\Services\SchoolServiceInterface;
use App\Http\Resources\IndexSchoolResource;
use App\Core\DTOs\SchoolDTO;

class SchoolController extends Controller
{
    public function __construct(
        private SchoolServiceInterface $service
    ) {
        // 
    }

    public function index()
    {
        $governorateId = request()->query('governorate_id');
        $perPage = request()->query('per_page', 10);

        $schools = $governorateId
            ? $this->service->listByGovernorate($governorateId)
            : $this->service->list($perPage);

        if ($schools->isEmpty()) {
            return $this->errorResponse('Schools not found');
        }

        $resource = IndexSchoolResource::collection($schools);

        return $governorateId
            ? $this->successResponse($resource, 'Schools found')
            : $this->successResponsePaginate($resource, $schools, 'Schools found');
    }

    public function show(int $id)
    {
        $school = $this->service->get($id);
        if (!$school) return $this->errorResponse('School not found');
        return $this->successResponse(new IndexSchoolResource($school));
    }

    public function store(StoreSchoolRequest $request)
    {
        $dto = new SchoolDTO(null, ...array_values($request->validated()));
        $school = $this->service->create($dto);
        return $this->successResponse(new IndexSchoolResource($school), 'School created successfully');
    }

    public function update(UpdateSchoolRequest $request, int $id)
    {
        $dto = new SchoolDTO($id, ...array_values($request->validated()));
        $school = $this->service->update($id, $dto);
        if (!$school) return $this->errorResponse('School not found');
        return $this->successResponse(new IndexSchoolResource($school), 'School updated successfully');
    }

    public function destroy(int $id)
    {
        $deleted = $this->service->delete($id);
        if (!$deleted) return $this->errorResponse('School not found');
        return $this->successResponse([], 'School deleted successfully');
    }
}
