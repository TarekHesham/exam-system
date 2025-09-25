<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\GovernorateRepositoryInterface;
use App\Modules\UserManagement\Models\Governorate;
use Illuminate\Pagination\LengthAwarePaginator;

class GovernorateRepository implements GovernorateRepositoryInterface
{
    public function allPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Governorate::paginate($perPage);
    }

    public function find(int $id): ?Governorate
    {
        return Governorate::find($id);
    }
}
