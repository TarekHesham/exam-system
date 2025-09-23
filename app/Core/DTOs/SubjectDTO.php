<?php

namespace App\Core\DTOs;

class SubjectDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $code,
        public readonly ?string $section,
        public readonly int $duration_minutes,
        public readonly int $max_score,
        public readonly bool $has_essay_questions,
        public readonly bool $is_active,
    ) {}

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'code' => $this->code,
            'section' => $this->section,
            'duration_minutes' => $this->duration_minutes,
            'max_score' => $this->max_score,
            'has_essay_questions' => $this->has_essay_questions,
            'is_active' => $this->is_active,
        ];
    }
}
