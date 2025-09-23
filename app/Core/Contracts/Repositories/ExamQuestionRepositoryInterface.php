<?php

namespace App\Core\Contracts\Repositories;

use App\Modules\ExamManagement\Models\ExamQuestion;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ExamQuestionRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function all(): array;
    public function find(int $id): ?ExamQuestion;
    public function create(array $data): ExamQuestion;
    public function update(int $id, array $data): ?ExamQuestion;
    public function delete(int $id): bool;
    public function byExam(int $examId, int $perPage = 15): LengthAwarePaginator;
}
