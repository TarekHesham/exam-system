<?php

namespace App\Core\Contracts\Repositories;

use App\Modules\ExamManagement\Models\Subject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SubjectRepositoryInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Subject;
    public function create(array $data): Subject;
    public function update(Subject $subject, array $data): Subject;
    public function delete(Subject $subject): bool;
}
