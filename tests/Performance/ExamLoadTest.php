<?php

namespace Tests\Unit;

use App\Modules\Authentication\Models\User;
use App\Modules\ExamManagement\Models\Exam;
use PHPUnit\Framework\TestCase;

// tests/Performance/ExamLoadTest.php
class ExamLoadTest extends TestCase
{
    /** @test */
    public function exam_system_handles_concurrent_submissions(): void
    {
        // Arrange
        $exam = Exam::factory()->create();
        $students = User::factory()->student()->count(100)->create();

        $startTime = microtime(true);

        // Act - Simulate 100 concurrent submissions
        $promises = [];
        foreach ($students as $student) {
            $promises[] = $this->actingAs($student, 'sanctum')
                ->postJson("/api/v1/exams/{$exam->id}/start");
        }

        // Wait for all requests
        $responses = array_map(fn($promise) => $promise->wait(), $promises);

        $endTime = microtime(true);
        $totalTime = $endTime - $startTime;

        // Assert
        $this->assertLessThan(30, $totalTime); // Should complete within 30 seconds

        foreach ($responses as $response) {
            $this->assertEquals(200, $response->getStatusCode());
        }

        $this->assertDatabaseCount('exam_sessions', 100);
    }
}
