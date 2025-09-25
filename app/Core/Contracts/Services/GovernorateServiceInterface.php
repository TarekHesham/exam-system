<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\GovernorateDTO;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface GovernorateServiceInterface
{
    public function listGovernorates(int $perPage = 15): LengthAwarePaginator;
    public function getGovernorate(int $id): ?GovernorateDTO;
}
