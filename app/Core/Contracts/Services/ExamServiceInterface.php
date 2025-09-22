<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\{CreateExamDTO, ExamFilterDTO, UpdateExamDTO};
use App\Modules\ExamManagement\Models\Exam;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

interface ExamServiceInterface
{
    public function createExam(CreateExamDTO $dto): Exam;
    public function updateExam(int $examId, UpdateExamDTO $dto): Exam;
    public function deleteExam(int $examId): bool;
    public function getExam(int $examId): Exam;
    public function getExamWithDetails(int $examId): Exam;
    public function getExams(ExamFilterDTO $filters): LengthAwarePaginator;
    public function publishExam(int $examId): Exam;
    public function unpublishExam(int $examId): Exam;
    public function activateExam(int $examId): Exam;
    public function deactivateExam(int $examId): Exam;
    public function duplicateExam(int $examId, array $modifications = []): Exam;
    public function getExamStatistics(int $examId): array;
    public function canStudentAccessExam(int $examId, int $studentId): bool;
    public function getUpcomingExams(): Collection;
    public function getOngoingExams(): Collection;
    public function getCompletedExams(): Collection;
}
