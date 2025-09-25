<?php

namespace App\Core\DTOs;

class SchoolAdminDTO
{
    public function __construct(
        public readonly int $user_id,
        public readonly int $school_id,
        public readonly array $admin_permissions = [],
        public readonly bool $is_active = true
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            user_id: $data['user_id'],
            school_id: $data['school_id'],
            admin_permissions: $data['admin_permissions'] ?? [],
            is_active: $data['is_active'] ?? true
        );
    }

    public function toArray(): array
    {
        return [
            'user_id'          => $this->user_id,
            'school_id'        => $this->school_id,
            'admin_permissions' => $this->admin_permissions,
            'is_active'        => $this->is_active,
        ];
    }
}
