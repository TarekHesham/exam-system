<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\ExamSectionDTO;
use App\Modules\ExamManagement\Models\ExamSection;
use Illuminate\Pagination\LengthAwarePaginator;

interface ExamSectionServiceInterface
{
    public function list(int $perPage = 10): LengthAwarePaginator;
    public function get(int $id): ?ExamSection;
    public function create(ExamSectionDTO $dto): ExamSection;
    public function update(int $id, ExamSectionDTO $dto): ?ExamSection;
    public function delete(int $id): bool;
}
