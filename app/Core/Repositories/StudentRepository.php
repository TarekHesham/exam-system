<?php

namespace App\Core\Repositories;

use App\Modules\UserManagement\Models\Student;

class StudentRepository
{
    public function create(array $data): Student
    {
        return Student::create($data);
    }

    public function existsByCode(string $code): bool
    {
        return Student::where('student_code', $code)->exists();
    }

    public function ban(int $id, string $reason, ?\DateTime $banUntil = null): bool
    {
        return Student::where('id', $id)->update([
            'is_banned'  => true,
            'ban_reason' => $reason,
            'ban_until'  => $banUntil
        ]);
    }

    public function unban(int $id): bool
    {
        return Student::where('id', $id)->update([
            'is_banned'  => false,
            'ban_reason' => null,
            'ban_until'  => null
        ]);
    }

    public function getBySchool(int $schoolId, array $filters = [])
    {
        $query = Student::with(['user', 'school'])->where('school_id', $schoolId);

        if (isset($filters['academic_year'])) {
            $query->where('academic_year', $filters['academic_year']);
        }

        if (isset($filters['section'])) {
            $query->where('section', $filters['section']);
        }

        if (isset($filters['is_banned'])) {
            $query->where('is_banned', $filters['is_banned']);
        }

        return $query->paginate($filters['per_page'] ?? 15);
    }
}
