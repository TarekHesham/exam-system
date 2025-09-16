<?php

namespace App\Core\Services;

use App\Core\DTOs\UserDTO;
use App\Modules\Authentication\Models\User;
use App\Modules\UserManagement\Models\School;
use App\Modules\UserManagement\Models\SchoolAdmin;
use App\Modules\UserManagement\Models\Student;
use App\Modules\UserManagement\Models\Teacher;
use App\Modules\UserManagement\Models\TeacherSchoolAssignment;

class UserService
{
    /**
     * Create a new user
     */
    public function createUser(UserDTO $userData): User
    {
        return User::create($userData->toArray());
    }

    /**
     * Create teacher profile
     */
    public function createTeacherProfile(int $userId, array $teacherData): Teacher
    {
        return Teacher::create([
            'user_id' => $userId,
            ...$teacherData
        ]);
    }

    /**
     * Create student profile
     */
    public function createStudentProfile(int $userId, array $studentData): Student
    {
        return Student::create([
            'user_id' => $userId,
            ...$studentData
        ]);
    }

    /**
     * Create school admin profile
     */
    public function createSchoolAdminProfile(int $userId, array $adminData): SchoolAdmin
    {
        return SchoolAdmin::create([
            'user_id' => $userId,
            'school_id' => $adminData['school_id'],
            'admin_permissions' => $adminData['admin_permissions'] ?? [
                'manage_students' => true,
                'view_reports' => true,
                'manage_school_settings' => false,
                'manage_exams' => false
            ],
            'is_active' => $adminData['is_active'] ?? true,
            'assigned_at' => now()
        ]);
    }

    /**
     * Assign teacher to schools
     */
    public function assignTeacherToSchools(int $teacherId, array $schoolIds, string $assignmentType = 'teaching'): void
    {
        foreach ($schoolIds as $schoolId) {
            TeacherSchoolAssignment::create([
                'teacher_id' => $teacherId,
                'school_id' => $schoolId,
                'assignment_type' => $assignmentType,
                'is_active' => true,
                'assigned_at' => now()
            ]);
        }
    }

    /**
     * Check if teacher code exists
     */
    public function teacherCodeExists(string $code): bool
    {
        return Teacher::where('teacher_code', $code)->exists();
    }

    /**
     * Check if student code exists
     */
    public function studentCodeExists(string $code): bool
    {
        return Student::where('student_code', $code)->exists();
    }

    /**
     * Find school by ID
     */
    public function findSchoolById(int $schoolId): ?School
    {
        return School::find($schoolId);
    }

    /**
     * Get user with relationships
     */
    public function getUserWithRelations(int $userId): ?User
    {
        return User::with([
            'student.school.governorate',
            'teacher.schoolAssignments.school',
            'schoolAdmin.school.governorate'
        ])->find($userId);
    }

    /**
     * Update user status
     */
    public function updateUserStatus(int $userId, bool $isActive): bool
    {
        return User::where('id', $userId)->update(['is_active' => $isActive]);
    }

    /**
     * Ban student
     */
    public function banStudent(int $studentId, string $reason, ?\DateTime $banUntil = null): bool
    {
        return Student::where('id', $studentId)->update([
            'is_banned' => true,
            'ban_reason' => $reason,
            'ban_until' => $banUntil
        ]);
    }

    /**
     * Unban student
     */
    public function unbanStudent(int $studentId): bool
    {
        return Student::where('id', $studentId)->update([
            'is_banned' => false,
            'ban_reason' => null,
            'ban_until' => null
        ]);
    }

    /**
     * Get students by school
     */
    public function getStudentsBySchool(int $schoolId, array $filters = [])
    {
        $query = Student::with(['user', 'school'])
            ->where('school_id', $schoolId);

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

    /**
     * Get teachers by school
     */
    public function getTeachersBySchool(int $schoolId)
    {
        return Teacher::with(['user', 'schoolAssignments.school'])
            ->whereHas('schoolAssignments', function ($query) use ($schoolId) {
                $query->where('school_id', $schoolId)
                    ->where('is_active', true);
            })
            ->paginate(15);
    }
}
