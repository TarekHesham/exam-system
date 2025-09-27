<?php

namespace App\Core\DTOs;

final class StudentDTO
{
    public function __construct(
        public readonly int $user_id,
        public readonly int $school_id,
        public readonly string $student_code,
        public readonly ?string $seat_number,
        public readonly string $academic_year,
        public readonly string $section,
        public readonly ?string $birth_date,
        public readonly string $gender,
        public readonly string $guardian_phone,
        public readonly bool $is_banned = false,
        public readonly ?string $ban_until = null,
        public readonly ?string $ban_reason = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            user_id: (int) $data['user_id'],
            school_id: (int) $data['school_id'],
            student_code: (string) $data['student_code'],
            seat_number: $data['seat_number'] ?? null,
            academic_year: (string) $data['academic_year'],
            section: (string) $data['section'],
            birth_date: $data['birth_date'] ?? null,
            gender: (string) $data['gender'],
            guardian_phone: (string) $data['guardian_phone'],
            is_banned: $data['is_banned'] ?? false,
            ban_until: $data['ban_until'] ?? null,
            ban_reason: $data['ban_reason'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'user_id'        => $this->user_id,
            'school_id'      => $this->school_id,
            'student_code'   => $this->student_code,
            'seat_number'    => $this->seat_number,
            'academic_year'  => $this->academic_year,
            'section'        => $this->section,
            'birth_date'     => $this->birth_date,
            'gender'         => $this->gender,
            'guardian_phone' => $this->guardian_phone,
            'is_banned'      => $this->is_banned,
            'ban_until'      => $this->ban_until,
            'ban_reason'     => $this->ban_reason,
        ];
    }
}
