<?php

namespace App\Core\Contracts\Repositories;

use App\Modules\UserManagement\Models\Governorate;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface GovernorateRepositoryInterface
{
    public function allPaginated(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Governorate;
}
