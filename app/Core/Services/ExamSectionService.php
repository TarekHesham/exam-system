<?php

namespace App\Core\Services;

use App\Core\Contracts\Repositories\ExamSectionRepositoryInterface;
use App\Core\Contracts\Services\ExamSectionServiceInterface;
use App\Modules\ExamManagement\Models\ExamSection;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Core\DTOs\ExamSectionDTO;

class ExamSectionService implements ExamSectionServiceInterface
{
    public function __construct(
        protected ExamSectionRepositoryInterface $repository
    ) {}

    public function list(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }

    public function get(int $id): ?ExamSection
    {
        return $this->repository->find($id);
    }

    public function create(ExamSectionDTO $dto): ExamSection
    {
        return $this->repository->create([
            'exam_id'      => $dto->exam_id,
            'code'         => $dto->code,
            'name'         => $dto->name,
            'order_number' => $dto->order_number,
        ]);
    }

    public function update(int $id, ExamSectionDTO $dto): ?ExamSection
    {
        return $this->repository->update($id, [
            'exam_id'      => $dto->exam_id,
            'code'         => $dto->code,
            'name'         => $dto->name,
            'order_number' => $dto->order_number,
        ]);
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
