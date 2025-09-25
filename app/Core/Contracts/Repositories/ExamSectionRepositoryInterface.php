<?php

namespace App\Core\Contracts\Repositories;

use App\Modules\ExamManagement\Models\ExamSection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ExamSectionRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator;
    public function find(int $id): ?ExamSection;
    public function create(array $data): ExamSection;
    public function update(int $id, array $data): ?ExamSection;
    public function delete(int $id): bool;
}
