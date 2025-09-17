<?php

namespace App\Core\DTOs;

class UserDTO
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $national_id,
        public readonly string $user_type,
        public readonly string $password,
        public readonly bool $is_active = true,
        public readonly ?string $email_verified_at = null
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            phone: $data['phone'],
            national_id: $data['national_id'],
            user_type: $data['user_type'],
            password: $data['password'],
            is_active: $data['is_active'],
            email_verified_at: $data['email_verified_at'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'name'              => $this->name,
            'email'             => $this->email,
            'phone'             => $this->phone,
            'national_id'       => $this->national_id,
            'user_type'         => $this->user_type,
            'password'          => $this->password,
            'is_active'         => $this->is_active,
            'email_verified_at' => $this->email_verified_at,
        ];
    }
}
