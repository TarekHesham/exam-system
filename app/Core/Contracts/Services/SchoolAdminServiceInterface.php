<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\SchoolAdminDTO;
use App\Modules\UserManagement\Models\SchoolAdmin;

interface SchoolAdminServiceInterface
{
    public function paginate(int $perPage = 15);
    public function find(int $id): ?SchoolAdmin;
    public function create(SchoolAdminDTO $dto): SchoolAdmin;
    public function update(int $id, SchoolAdminDTO $dto): bool;
    public function delete(int $id): bool;
}
