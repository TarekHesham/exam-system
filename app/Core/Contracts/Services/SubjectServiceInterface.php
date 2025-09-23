<?php

namespace App\Core\Contracts\Services;

use App\Core\DTOs\SubjectDTO;
use App\Modules\ExamManagement\Models\Subject;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;


interface SubjectServiceInterface
{
    public function paginate(int $perPage = 15): LengthAwarePaginator;
    public function find(int $id): ?Subject;
    public function store(SubjectDTO $dto): Subject;
    public function update(int $id, SubjectDTO $dto): ?Subject;
    public function delete(int $id): bool;
}
