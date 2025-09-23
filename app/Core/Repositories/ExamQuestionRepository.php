<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\ExamQuestionRepositoryInterface;
use App\Modules\ExamManagement\Models\ExamQuestion;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ExamQuestionRepository implements ExamQuestionRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return ExamQuestion::query()->latest()->paginate($perPage);
    }

    public function all(): array
    {
        return ExamQuestion::query()->get()->toArray();
    }

    public function find(int $id): ?ExamQuestion
    {
        return ExamQuestion::query()->find($id);
    }

    public function create(array $data): ExamQuestion
    {
        // cast options to json if provided as array
        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }

        return ExamQuestion::create($data);
    }

    public function update(int $id, array $data): ?ExamQuestion
    {
        $model = $this->find($id);
        if (! $model) {
            return null;
        }

        if (isset($data['options']) && is_array($data['options'])) {
            $data['options'] = json_encode($data['options']);
        }

        $model->update($data);

        return $model->fresh();
    }

    public function delete(int $id): bool
    {
        $model = $this->find($id);
        if (! $model) {
            return false;
        }

        return (bool) $model->delete();
    }

    public function byExam(int $examId, int $perPage = 15): LengthAwarePaginator
    {
        return ExamQuestion::query()->where('exam_id', $examId)->latest()->paginate($perPage);
    }
}
