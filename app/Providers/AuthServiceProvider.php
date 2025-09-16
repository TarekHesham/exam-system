<?php

namespace App\Providers;

use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Define Gates for permissions
        Gate::define('create-teachers', function (User $user) {
            return $user->user_type === 'ministry_admin';
        });

        Gate::define('create-school-admins', function (User $user) {
            return $user->user_type === 'ministry_admin';
        });

        Gate::define('create-students', function (User $user) {
            return $user->user_type === 'school_admin';
        });

        Gate::define('create-exams', function (User $user) {
            return $user->user_type === 'ministry_admin' ||
                ($user->user_type === 'teacher' && $user->teacher?->can_create_exams);
        });

        Gate::define('correct-essays', function (User $user) {
            return $user->user_type === 'teacher' && $user->teacher?->can_correct_essays;
        });

        Gate::define('access-school', function (User $user, int $schoolId) {
            switch ($user->user_type) {
                case 'ministry_admin':
                    return true;
                case 'school_admin':
                    return $user->schoolAdmin?->school_id === $schoolId;
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
        });

        Gate::define('take-exam', function (User $user, Exam $exam) {
            if ($user->user_type !== 'student') {
                return false;
            }

            $student = $user->student;
            if (!$student || $student->is_banned) {
                return false;
            }

            // Check if exam is for student's academic year
            return $exam->academic_year === $student->academic_year;
        });
    }
}
