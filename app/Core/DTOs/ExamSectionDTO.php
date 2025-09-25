<?php

namespace App\Core\DTOs;

class ExamSectionDTO
{
    public function __construct(
        public readonly int $exam_id,
        public readonly string $code,
        public readonly string $name,
        public readonly int $order_number,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            exam_id: $data['exam_id'],
            code: $data['code'],
            name: $data['name'],
            order_number: $data['order_number'],
        );
    }
}
