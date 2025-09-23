<?php

namespace App\Core\Services;

use App\Core\Contracts\Repositories\SubjectRepositoryInterface;
use App\Core\Contracts\Services\SubjectServiceInterface;
use App\Core\DTOs\SubjectDTO;
use App\Modules\ExamManagement\Models\Subject;
use Illuminate\Pagination\LengthAwarePaginator;

class SubjectService implements SubjectServiceInterface
{
    public function __construct(
        protected SubjectRepositoryInterface $repository
    ) {}

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }

    public function find(int $id): ?Subject
    {
        return $this->repository->find($id);
    }

    public function store(SubjectDTO $dto): Subject
    {
        return $this->repository->create($dto->toArray());
    }

    public function update(int $id, SubjectDTO $dto): ?Subject
    {
        $subject = $this->repository->find($id);
        if (!$subject) {
            return null;
        }
        return $this->repository->update($subject, $dto->toArray());
    }

    public function delete(int $id): bool
    {
        $subject = $this->repository->find($id);
        if (!$subject) {
            return false;
        }
        return $this->repository->delete($subject);
    }
}
