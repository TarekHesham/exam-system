<?php

namespace Tests\Unit;

use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use Carbon\Carbon;
use PHPUnit\Framework\TestCase;

class ExamSubmissionIntegrationTest extends TestCase
{
    /** @test */
    public function student_can_complete_full_exam_flow(): void
    {
        // Arrange
        $student = User::factory()->student()->create();
        $exam = Exam::factory()
            ->withQuestions(5)
            ->create(['start_time' => Carbon::now()->subMinute()]);

        // Act & Assert - Start Exam
        $startResponse = $this->actingAs($student, 'sanctum')
            ->postJson("/api/v1/exams/{$exam->id}/start");

        $startResponse->assertStatus(200);
        $sessionToken = $startResponse->json('data.session_token');

        // Act & Assert - Answer Questions
        $answers = [];
        foreach ($exam->questions as $question) {
            $answerData = [
                'question_id' => $question->id,
                'answer' => $this->generateAnswerForQuestion($question)
            ];

            $answerResponse = $this->actingAs($student, 'sanctum')
                ->postJson("/api/v1/sessions/{$sessionToken}/answer", $answerData);

            $answerResponse->assertStatus(200);
            $answers[] = $answerData;
        }

        // Act & Assert - Submit Exam
        $submitResponse = $this->actingAs($student, 'sanctum')
            ->postJson("/api/v1/sessions/{$sessionToken}/submit");

        $submitResponse->assertStatus(200)
            ->assertJsonPath('data.status', 'submitted');

        // Assert database state
        $this->assertDatabaseHas('exam_sessions', [
            'session_token' => $sessionToken,
            'session_status' => 'submitted'
        ]);

        $this->assertDatabaseCount('student_answers', 5);
        $this->assertDatabaseHas('exam_results', [
            'student_id' => $student->student->id,
            'exam_id' => $exam->id
        ]);
    }
}
