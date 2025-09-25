<?php

namespace App\Core\Contracts\Repositories;

use App\Modules\UserManagement\Models\SchoolAdmin;

interface SchoolAdminRepositoryInterface
{
    public function paginate(int $perPage = 15);
    public function find(int $id): ?SchoolAdmin;
    public function create(array $data): SchoolAdmin;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
}
