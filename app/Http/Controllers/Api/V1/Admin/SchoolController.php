<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Core\Contracts\Services\SchoolServiceInterface;
use App\Core\DTOs\SchoolDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Http\Resources\IndexSchoolResource;

class SchoolController extends Controller
{
    public function __construct(
        private SchoolServiceInterface $service
    ) {
        // 
    }

    public function index()
    {
        $perPage = request()->get('per_page', 15);
        $schools = $this->service->list($perPage);
        return $this->successResponsePaginate(IndexSchoolResource::collection($schools), $schools);
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
