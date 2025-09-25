<?php

namespace App\Core\Services;

use App\Core\Contracts\Repositories\SchoolAdminRepositoryInterface;
use App\Core\Contracts\Services\SchoolAdminServiceInterface;
use App\Core\DTOs\SchoolAdminDTO;
use App\Modules\UserManagement\Models\SchoolAdmin;

class SchoolAdminService implements SchoolAdminServiceInterface
{
    public function __construct(
        private SchoolAdminRepositoryInterface $repository
    ) {
        // 
    }

    public function paginate(int $perPage = 10)
    {
        return $this->repository->paginate($perPage);
    }

    public function find(int $id): ?SchoolAdmin
    {
        return $this->repository->find($id);
    }

    public function create(SchoolAdminDTO $dto): SchoolAdmin
    {
        return $this->repository->create($dto->toArray());
    }

    public function update(int $id, SchoolAdminDTO $dto): bool
    {
        return $this->repository->update($id, $dto->toArray());
    }

    public function delete(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
