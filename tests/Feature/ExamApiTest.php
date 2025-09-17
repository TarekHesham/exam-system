<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Subject;
use Carbon\Carbon;

class ExamApiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    /** @test */
    public function student_can_get_available_exams(): void
    {
        $student = User::factory()->student()->create();

        $response = $this->actingAs($student, 'sanctum')
            ->getJson('/api/v1/exams');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'title', 'subject', 'start_time']
                ]
            ]);
    }

    /** @test */
    public function teacher_can_create_exam(): void
    {
        // Arrange
        $teacher = User::factory()->teacher()->create();
        $subject = Subject::factory()->create();

        $examData = [
            'title' => 'Physics Final Exam',
            'subject_id' => $subject->id,
            'start_time' => Carbon::now()->addDay()->toISOString(),
            'duration_minutes' => 120,
            'questions' => [
                [
                    'type' => 'multiple_choice',
                    'text' => 'What is the speed of light?',
                    'options' => ['299,792,458 m/s', '300,000,000 m/s'],
                    'correct_answer' => '299,792,458 m/s',
                    'points' => 10
                ]
            ]
        ];

        // Act
        $response = $this->actingAs($teacher, 'sanctum')
            ->postJson('/api/v1/exams', $examData);

        // Assert
        $response->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'subject',
                    'questions'
                ]
            ]);

        $this->assertDatabaseHas('exams', [
            'title' => 'Physics Final Exam',
            'created_by' => $teacher->teacher->id
        ]);
    }
}
