<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\SchoolAdminRepositoryInterface;
use App\Modules\UserManagement\Models\SchoolAdmin;

class SchoolAdminRepository implements SchoolAdminRepositoryInterface
{
    public function paginate(int $perPage = 15)
    {
        return SchoolAdmin::with(['user', 'school'])->paginate($perPage);
    }

    public function find(int $id): ?SchoolAdmin
    {
        return SchoolAdmin::with(['user', 'school'])->find($id);
    }

    public function create(array $data): SchoolAdmin
    {
        return SchoolAdmin::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $admin = SchoolAdmin::findOrFail($id);
        return $admin->update($data);
    }

    public function delete(int $id): bool
    {
        $admin = SchoolAdmin::findOrFail($id);
        return $admin->delete();
    }
}
