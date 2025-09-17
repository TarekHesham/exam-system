<?php

namespace Tests\Unit;

use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use PHPUnit\Framework\TestCase;

class AuthenticationTest extends TestCase
{
    /** @test */
    public function student_cannot_access_teacher_endpoints(): void
    {
        // Arrange
        $student = User::factory()->student()->create();

        // Act & Assert
        $response = $this->actingAs($student, 'sanctum')
            ->postJson('/api/v1/exams', [
                'title' => 'Unauthorized Exam'
            ]);

        $response->assertStatus(403)
            ->assertJsonPath('message', 'Unauthorized access');
    }

    /** @test */
    public function exam_session_requires_valid_ip(): void
    {
        // Arrange
        $student = User::factory()->student()->create();
        $exam = Exam::factory()->create();

        // Mock invalid IP
        $this->app['request']->server->set('REMOTE_ADDR', '192.168.1.100');

        // Act
        $response = $this->actingAs($student, 'sanctum')
            ->postJson("/api/v1/exams/{$exam->id}/start");

        // Assert
        $response->assertStatus(403)
            ->assertJsonPath('message', 'Invalid location for exam');
    }
}
