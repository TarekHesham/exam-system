<?php

namespace App\Core\Contracts\Repositories;

use App\Modules\UserManagement\Models\School;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface SchoolRepositoryInterface
{
    public function allPaginated(int $perPage): LengthAwarePaginator;
    public function findByGovernorateId(int $governorateId): Collection;
    public function find(int $id): ?School;
    public function create(array $data): School;
    public function update(School $school, array $data): School;
    public function delete(School $school): bool;
}
