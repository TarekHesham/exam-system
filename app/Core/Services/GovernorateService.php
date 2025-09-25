<?php

namespace App\Core\Services;

use App\Core\Contracts\Repositories\GovernorateRepositoryInterface;
use App\Core\Contracts\Services\GovernorateServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Core\DTOs\GovernorateDTO;

class GovernorateService implements GovernorateServiceInterface
{
    protected GovernorateRepositoryInterface $repository;

    public function __construct(GovernorateRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function listGovernorates(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->allPaginated($perPage);
    }

    public function getGovernorate(int $id): ?GovernorateDTO
    {
        $governorate = $this->repository->find($id);
        if (!$governorate) return null;

        return new GovernorateDTO($governorate->id, $governorate->name, $governorate->code, $governorate->is_active);
    }
}
