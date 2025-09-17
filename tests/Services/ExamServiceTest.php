<?php

namespace Tests\Unit;

use App\Core\Repositories\ExamRepository;
use App\Core\Services\ExamService;
use App\Modules\ExamManagement\Models\Exam;
use Carbon\Carbon;
use Mockery;
use PHPUnit\Framework\TestCase;

class ExamServiceTest extends TestCase
{
    private ExamService $examService;
    private ExamRepository $examRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->examRepository = Mockery::mock(ExamRepository::class);
        $this->examService = new ExamService($this->examRepository);
    }

    /** @test */
    public function it_creates_exam_with_questions(): void
    {
        // Arrange
        $examDTO = new CreateExamDTO(
            title: 'Math Final Exam',
            subjectId: 1,
            startTime: Carbon::now()->addDay(),
            durationMinutes: 180,
            questions: [
                ['type' => 'multiple_choice', 'text' => 'What is 2+2?']
            ]
        );

        $this->examRepository
            ->shouldReceive('create')
            ->once()
            ->andReturn(new Exam(['id' => 1]));

        // Act
        $exam = $this->examService->createExam($examDTO);

        // Assert
        $this->assertInstanceOf(Exam::class, $exam);
        $this->assertEquals(1, $exam->id);
    }
}
