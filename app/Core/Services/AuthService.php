<?php

namespace App\Core\Services;

use App\Core\Models\ActivityLog;
use App\Modules\Authentication\Models\User;
use Carbon\Carbon;

class AuthService
{
    /**
     * Find user by email
     */
    public function findUserByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    /**
     * Find user by Identifier
     */
    public function findUserByIdentifier($identifier): ?User
    {
        return User::where('email', $identifier)
            ->orWhere('national_id', $identifier)
            ->orWhere('phone', $identifier)
            ->first();
    }

    /**
     * Create access token for user
     */
    public function createToken(User $user, array $abilitys): array
    {
        // Delete existing tokens for this user before creating a new one
        $user->tokens()->delete();

        $token = $user->createToken('auth_token', $abilitys, Carbon::now()->addDays(30));

        return [
            'token'      => $token->plainTextToken,
            'expires_at' => $token->accessToken->expires_at
        ];
    }

    /**
     * Log user activity
     */
    public function logActivity(int $userId, string $actionType, array $data = []): void
    {
        ActivityLog::create([
            'user_id' => $userId,
            'action_type' => $actionType,
            'model_type' => 'User',
            'model_id' => $userId,
            'old_values' => null,
            'new_values' => json_encode($data),
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
            'performed_at' => now(),
        ]);
    }

    /**
     * Validate user permissions
     */
    public function hasPermission(User $user, string $permission): bool
    {
        switch ($user->user_type) {
            case 'ministry_admin':
                return in_array($permission, [
                    'create_teachers',
                    'create_school_admins',
                    'manage_schools',
                    'view_all_reports',
                    'manage_system_settings'
                ]);

            case 'school_admin':
                return in_array($permission, [
                    'create_students',
                    'manage_school_students',
                    'view_school_reports'
                ]);

            case 'teacher':
                $teacher = $user->teacher;
                if (!$teacher) return false;

                return match ($permission) {
                    'create_exams' => $teacher->can_create_exams,
                    'correct_essays' => $teacher->can_correct_essays,
                    'view_student_results' => true,
                    default => false
                };

            case 'student':
                return in_array($permission, [
                    'take_exams',
                    'view_own_results',
                    'submit_appeals'
                ]);

            default:
                return false;
        }
    }

    /**
     * Check if user can access school data
     */
    public function canAccessSchool(User $user, int $schoolId): bool
    {
        switch ($user->user_type) {
            case 'ministry_admin':
                return true;

            case 'school_admin':
                return $user->schoolAdmin()
                    ->where('school_id', $schoolId)
                    ->where('is_active', true)
                    ->exists();

            case 'teacher':
                return $user->teacher?->schoolAssignments()
                    ->where('school_id', $schoolId)
                    ->where('is_active', true)
                    ->exists() ?? false;

            case 'student':
                return $user->student?->school_id === $schoolId;

            default:
                return false;
        }
    }
}
