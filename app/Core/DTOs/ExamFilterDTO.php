<?php

namespace App\Core\DTOs;

class ExamFilterDTO
{
    public function __construct(
        public readonly ?int $subjectId = null,
        public readonly ?int $createdBy = null,
        public readonly ?string $examType = null,
        public readonly ?string $academicYear = null,
        public readonly ?bool $isPublished = null,
        public readonly ?bool $isActive = null,
        public readonly ?string $startDate = null,
        public readonly ?string $endDate = null,
        public readonly ?string $search = null,
        public readonly int $page = 1,
        public readonly int $perPage = 10
    ) {}

    public static function fromRequest(array $data): self
    {
        return new self(
            subjectId: $data['subject_id'] ?? null,
            createdBy: $data['created_by'] ?? null,
            examType: $data['exam_type'] ?? null,
            academicYear: $data['academic_year'] ?? null,
            isPublished: isset($data['is_published']) ? (bool)$data['is_published'] : null,
            isActive: isset($data['is_active']) ? (bool)$data['is_active'] : null,
            startDate: $data['start_date'] ?? null,
            endDate: $data['end_date'] ?? null,
            search: $data['search'] ?? null,
            page: (int)($data['page'] ?? 1),
            perPage: (int)($data['per_page'] ?? 10)
        );
    }
}
