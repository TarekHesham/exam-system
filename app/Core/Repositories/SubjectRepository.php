<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\SubjectRepositoryInterface;
use App\Modules\ExamManagement\Models\Subject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


class SubjectRepository implements SubjectRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return Subject::query()->latest()->paginate($perPage);
    }

    public function find(int $id): ?Subject
    {
        return Subject::find($id);
    }

    public function create(array $data): Subject
    {
        return Subject::create($data);
    }

    public function update(Subject $subject, array $data): Subject
    {
        $subject->update($data);
        return $subject;
    }

    public function delete(Subject $subject): bool
    {
        return $subject->delete();
    }
}
