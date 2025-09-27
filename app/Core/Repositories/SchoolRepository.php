<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\SchoolRepositoryInterface;
use App\Modules\UserManagement\Models\School;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class SchoolRepository implements SchoolRepositoryInterface
{
    public function allPaginated(int $perPage): LengthAwarePaginator
    {
        return School::with('governorate')->paginate($perPage);
    }

    public function findByGovernorateId(int $governorateId): Collection
    {
        return School::with('governorate')
            ->where('governorate_id', $governorateId)
            ->get();
    }

    public function find(int $id): ?School
    {
        return School::with(['governorate', 'students', 'schoolAdmins'])->find($id);
    }

    public function create(array $data): School
    {
        return School::create($data);
    }

    public function update(School $school, array $data): School
    {
        $school->update($data);
        return $school;
    }

    public function delete(School $school): bool
    {
        return $school->delete();
    }
}
