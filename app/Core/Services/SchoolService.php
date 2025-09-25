<?php

namespace App\Core\Services;

use App\Core\Contracts\Repositories\SchoolRepositoryInterface;
use App\Core\Contracts\Services\SchoolServiceInterface;
use App\Core\DTOs\SchoolDTO;

class SchoolService implements SchoolServiceInterface
{
    public function __construct(
        private SchoolRepositoryInterface $repo
    ) {
        // 
    }

    public function list(int $perPage)
    {
        return $this->repo->allPaginated($perPage);
    }

    public function get(int $id)
    {
        return $this->repo->find($id);
    }

    public function create(SchoolDTO $dto)
    {
        return $this->repo->create((array)$dto);
    }

    public function update(int $id, SchoolDTO $dto)
    {
        $school = $this->repo->find($id);
        if (!$school) return null;
        return $this->repo->update($school, (array)$dto);
    }

    public function delete(int $id)
    {
        $school = $this->repo->find($id);
        if (!$school) return false;
        return $this->repo->delete($school);
    }
}
