<?php

namespace App\Core\Repositories;

use App\Core\Contracts\Repositories\ExamSectionRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Modules\ExamManagement\Models\ExamSection;

class ExamSectionRepository implements ExamSectionRepositoryInterface
{
    public function paginate(int $perPage = 10): LengthAwarePaginator
    {
        return ExamSection::with('questions')->paginate($perPage);
    }

    public function find(int $id): ?ExamSection
    {
        return ExamSection::with('questions')->find($id);
    }

    public function create(array $data): ExamSection
    {
        return ExamSection::create($data);
    }

    public function update(int $id, array $data): ?ExamSection
    {
        $section = ExamSection::find($id);
        if (!$section) {
            return null;
        }
        $section->update($data);
        return $section;
    }

    public function delete(int $id): bool
    {
        $section = ExamSection::find($id);
        if (!$section) {
            return false;
        }
        return $section->delete();
    }
}
