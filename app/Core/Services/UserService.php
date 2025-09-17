<?php

namespace App\Core\Services;

use App\Core\DTOs\UserDTO;
use App\Core\Repositories\UserRepository;
use App\Core\Repositories\TeacherRepository;
use App\Core\Repositories\StudentRepository;
use App\Core\Repositories\SchoolRepository;
use App\Modules\Authentication\Models\User;
use App\Modules\UserManagement\Models\SchoolAdmin;
use App\Modules\UserManagement\Models\Teacher;
use App\Modules\UserManagement\Models\Student;

class UserService
{
    public function __construct(
        private UserRepository $userRepository,
        private TeacherRepository $teacherRepository,
        private StudentRepository $studentRepository,
        private SchoolRepository $schoolRepository
    ) {}

    /**
     * Create a new user
     */
    public function createUser(UserDTO $userData): User
    {
        return $this->userRepository->create($userData->toArray());
    }

    /**
     * Create teacher profile
     */
    public function createTeacherProfile(int $userId, array $teacherData): Teacher
    {
        return $this->teacherRepository->create([
            'user_id' => $userId,
            ...$teacherData
        ]);
    }

    /**
     * Create student profile
     */
    public function createStudentProfile(int $userId, array $studentData): Student
    {
        return $this->studentRepository->create([
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
            'user_id'          => $userId,
            'school_id'        => $adminData['school_id'],
            'admin_permissions' => $adminData['admin_permissions'] ?? [
                'manage_students'        => true,
                'view_reports'           => true,
                'manage_school_settings' => false,
                'manage_exams'           => false
            ],
            'is_active'        => $adminData['is_active'] ?? true,
            'assigned_at'      => now()
        ]);
    }

    /**
     * Assign teacher to schools
     */
    public function assignTeacherToSchools(int $teacherId, array $schoolIds, string $assignmentType = 'teaching'): void
    {
        $this->teacherRepository->assignToSchools($teacherId, $schoolIds, $assignmentType);
    }

    /**
     * Check if teacher code exists
     */
    public function teacherCodeExists(string $code): bool
    {
        return $this->teacherRepository->existsByCode($code);
    }

    /**
     * Check if student code exists
     */
    public function studentCodeExists(string $code): bool
    {
        return $this->studentRepository->existsByCode($code);
    }

    /**
     * Find school by ID
     */
    public function findSchoolById(int $schoolId)
    {
        return $this->schoolRepository->find($schoolId);
    }

    /**
     * Get user with relationships
     */
    public function getUserWithRelations(int $userId): ?User
    {
        return $this->userRepository->findWithRelations($userId);
    }

    /**
     * Update user status
     */
    public function updateUserStatus(int $userId, bool $isActive): bool
    {
        return $this->userRepository->updateStatus($userId, $isActive);
    }

    /**
     * Ban student
     */
    public function banStudent(int $studentId, string $reason, ?\DateTime $banUntil = null): bool
    {
        return $this->studentRepository->ban($studentId, $reason, $banUntil);
    }

    /**
     * Unban student
     */
    public function unbanStudent(int $studentId): bool
    {
        return $this->studentRepository->unban($studentId);
    }

    /**
     * Get students by school
     */
    public function getStudentsBySchool(int $schoolId, array $filters = [])
    {
        return $this->studentRepository->getBySchool($schoolId, $filters);
    }

    /**
     * Get teachers by school
     */
    public function getTeachersBySchool(int $schoolId)
    {
        return $this->teacherRepository->getBySchool($schoolId);
    }
}
