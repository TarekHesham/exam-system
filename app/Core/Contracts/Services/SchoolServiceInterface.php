<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\SchoolDTO;

interface SchoolServiceInterface
{
    public function list(int $perPage);
    public function listByGovernorate(int $governorateId);
    public function get(int $id);
    public function create(SchoolDTO $dto);
    public function update(int $id, SchoolDTO $dto);
    public function delete(int $id);
}
