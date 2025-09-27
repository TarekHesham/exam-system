<?php

namespace App\Core\Services;

use App\Core\DTOs\StudentDTO;
use App\Modules\UserManagement\Models\Student;
use Illuminate\Pagination\LengthAwarePaginator;

class StudentService
{
    /**
     * List students with optional filters and pagination.
     */
    public function list(array $filters = [], int $perPage = 15): LengthAwarePaginator
    {
        $query = Student::with(['user', 'school']);

        if (!empty($filters['school_id'])) {
            $query->where('school_id', $filters['school_id']);
        }
        if (!empty($filters['academic_year'])) {
            $query->where('academic_year', $filters['academic_year']);
        }
        if (!empty($filters['section'])) {
            $query->where('section', $filters['section']);
        }
        if (!empty($filters['search'])) {
            $q = $filters['search'];
            $query->whereHas('user', fn($q2) => $q2->where('name', 'like', "%{$q}%")->orWhere('email', 'like', "%{$q}%")->orWhere('phone', 'like', "%{$q}%"));
        }

        return $query->orderBy('id', 'desc')->paginate($perPage);
    }

    /**
     * Create new student (expects a StudentDTO).
     */
    public function create(StudentDTO $dto): Student
    {
        $data = $dto->toArray();
        return Student::create($data);
    }

    /**
     * Update student profile.
     */
    public function update(int $studentId, array $payload): Student
    {
        $student = Student::findOrFail($studentId);
        $student->fill($payload);
        $student->save();

        return $student;
    }

    /**
     * Find student with relations.
     */
    public function find(int $studentId): Student
    {
        return Student::with(['user', 'school'])->findOrFail($studentId);
    }

    /**
     * Delete student and optionally related user.
     */
    public function delete(int $studentId): void
    {
        $student = Student::with(['user'])->findOrFail($studentId);
        $student->user()->delete();
        $student->delete();
    }
}
