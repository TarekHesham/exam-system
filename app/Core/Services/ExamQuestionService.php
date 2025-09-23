<?php

namespace App\Core\Services;

use App\Core\Contracts\Repositories\ExamQuestionRepositoryInterface;
use App\Core\Contracts\Services\ExamQuestionServiceInterface;
use App\Modules\ExamManagement\Models\ExamQuestion;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Core\DTOs\ExamQuestionData;
use Illuminate\Support\Facades\DB;

class ExamQuestionService implements ExamQuestionServiceInterface
{
    private ExamQuestionRepositoryInterface $repo;

    public function __construct(ExamQuestionRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function list(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repo->paginate($perPage);
    }

    public function listByExam(int $examId, int $perPage = 15): LengthAwarePaginator
    {
        return $this->repo->byExam($examId, $perPage);
    }

    public function get(int $id): ?ExamQuestion
    {
        return $this->repo->find($id);
    }

    public function create(ExamQuestionData $data): ExamQuestion
    {
        return DB::transaction(function () use ($data) {
            $created = $this->repo->create($data->toArray());
            return $created;
        });
    }

    public function update(int $id, ExamQuestionData $data): ?ExamQuestion
    {
        return DB::transaction(function () use ($id, $data) {
            return $this->repo->update($id, $data->toArray());
        });
    }

    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            return $this->repo->delete($id);
        });
    }
}
