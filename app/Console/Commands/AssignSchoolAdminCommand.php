<?php

namespace App\Console\Commands;

use App\Modules\Authentication\Models\User;
use App\Modules\UserManagement\Models\School;
use App\Modules\UserManagement\Models\SchoolAdmin;
use Illuminate\Console\Command;

class AssignSchoolAdminCommand extends Command
{
    protected $signature = 'user:assign-school-admin 
                            {user_id : User ID to assign as school admin}
                            {school_id : School ID to assign to}
                            {--permissions=* : Admin permissions}';

    protected $description = 'Assign existing user as school admin';

    public function handle()
    {
        $userId = $this->argument('user_id');
        $schoolId = $this->argument('school_id');
        $permissions = $this->option('permissions');

        $user = User::find($userId);
        if (!$user) {
            $this->error('User not found!');
            return 1;
        }

        if ($user->user_type !== 'school_admin') {
            $this->error('User type must be school_admin!');
            return 1;
        }

        $school = School::find($schoolId);
        if (!$school) {
            $this->error('School not found!');
            return 1;
        }

        // Check if already assigned
        if ($user->schoolAdmin()->where('school_id', $schoolId)->exists()) {
            $this->error('User is already assigned to this school!');
            return 1;
        }

        $adminPermissions = [
            'manage_students' => in_array('manage_students', $permissions),
            'view_reports' => in_array('view_reports', $permissions),
            'manage_school_settings' => in_array('manage_school_settings', $permissions),
            'manage_exams' => in_array('manage_exams', $permissions),
        ];

        try {
            SchoolAdmin::create([
                'user_id' => $userId,
                'school_id' => $schoolId,
                'admin_permissions' => $adminPermissions,
                'is_active' => true,
                'assigned_at' => now(),
            ]);

            $this->info("School admin assigned successfully!");
            $this->info("User: {$user->name} ({$user->email})");
            $this->info("School: {$school->name} ({$school->code})");
            $this->info("Permissions: " . json_encode($adminPermissions));

            return 0;
        } catch (\Exception $e) {
            $this->error("Failed to assign school admin: " . $e->getMessage());
            return 1;
        }
    }
}
