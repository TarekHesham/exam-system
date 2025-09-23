<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\ExamQuestionData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Modules\ExamManagement\Models\ExamQuestion;

interface ExamQuestionServiceInterface
{
    public function list(int $perPage = 15): LengthAwarePaginator;
    public function listByExam(int $examId, int $perPage = 15): LengthAwarePaginator;
    public function get(int $id): ?ExamQuestion;
    public function create(ExamQuestionData $data): ExamQuestion;
    public function update(int $id, ExamQuestionData $data): ?ExamQuestion;
    public function delete(int $id): bool;
}
