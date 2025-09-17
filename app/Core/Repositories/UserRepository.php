<?php

namespace App\Core\Repositories;

use App\Modules\Authentication\Models\User;

class UserRepository
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function find(int $id): ?User
    {
        return User::find($id);
    }

    public function findWithRelations(int $id): ?User
    {
        return User::with([
            'student.school.governorate',
            'teacher.schoolAssignments.school',
            'schoolAdmin.school.governorate'
        ])->find($id);
    }

    public function updateStatus(int $id, bool $isActive): bool
    {
        return User::where('id', $id)->update(['is_active' => $isActive]);
    }
}
