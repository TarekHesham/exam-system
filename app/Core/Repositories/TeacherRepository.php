<?php

namespace App\Core\Repositories;

use App\Modules\UserManagement\Models\Teacher;
use App\Modules\UserManagement\Models\TeacherSchoolAssignment;

class TeacherRepository
{
    public function create(array $data): Teacher
    {
        return Teacher::create($data);
    }

    public function existsByCode(string $code): bool
    {
        return Teacher::where('teacher_code', $code)->exists();
    }

    public function assignToSchools(int $teacherId, array $schoolIds, string $assignmentType = 'teaching'): void
    {
        foreach ($schoolIds as $schoolId) {
            TeacherSchoolAssignment::updateOrCreate(
                ['teacher_id' => $teacherId, 'school_id' => $schoolId],
                [
                    'assignment_type' => $assignmentType,
                    'is_active'       => true,
                    'assigned_at'     => now(),
                ]
            );
        }
    }

    public function getBySchool(int $schoolId)
    {
        return Teacher::with(['user', 'schoolAssignments.school'])
            ->whereHas('schoolAssignments', fn($q) => $q->where('school_id', $schoolId)->where('is_active', true))
            ->paginate(15);
    }
}
