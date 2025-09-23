<?php

namespace Tests\Feature;

use App\Modules\Authentication\Models\User;
use App\Modules\UserManagement\Models\SchoolAdmin;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class SchoolAdminTest extends TestCase
{

    public function ministry_admin_can_create_school_admin_with_school_assignment()
    {
        $ministryAdmin = User::factory()->create([
            'user_type' => 'ministry_admin'
        ]);

        Sanctum::actingAs($ministryAdmin);

        $response = $this->postJson('/api/v1/auth/create-school-admin', [
            'name' => 'مدير المدرسة',
            'email' => 'schooladmin@example.com',
            'phone' => '01555666777',
            'national_id' => '11111111111111',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'school_id' => 1,
            'admin_permissions' => [
                'manage_students' => true,
                'view_reports' => true,
                'manage_school_settings' => false,
                'manage_exams' => false
            ]
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'success' => true
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'schooladmin@example.com',
            'user_type' => 'school_admin'
        ]);

        $this->assertDatabaseHas('school_admins', [
            'school_id' => 1,
            'is_active' => true
        ]);

        $schoolAdmin = User::where('email', 'schooladmin@example.com')->first();
        $this->assertTrue($schoolAdmin->schoolAdmin->hasPermission('manage_students'));
        $this->assertFalse($schoolAdmin->schoolAdmin->hasPermission('manage_exams'));
    }

    /** @test */
    public function school_admin_can_only_create_students_in_their_assigned_school()
    {
        $user = User::factory()->create([
            'user_type' => 'school_admin'
        ]);

        // Create school admin assignment
        SchoolAdmin::factory()->create([
            'user_id' => $user->id,
            'school_id' => 1,
            'admin_permissions' => ['manage_students' => true],
            'is_active' => true
        ]);

        Sanctum::actingAs($user);

        $response = $this->postJson('/api/v1/auth/create-student', [
            'name' => 'طالب تجريبي',
            'email' => 'student@example.com',
            'phone' => '01999888777',
            'national_id' => '22222222222222',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'academic_year' => 'third',
            'section' => 'scientific',
            'birth_date' => '2005-01-01',
            'gender' => 'male',
            'guardian_phone' => '01111111111'
        ]);

        $response->assertStatus(201);

        // Verify student was created in the correct school
        $student = User::where('email', 'student@example.com')->first()->student;
        $this->assertEquals(1, $student->school_id);
    }
}
