<?php

namespace App\Core\DTOs;

class SchoolDTO
{
    public function __construct(
        public ?int $id,
        public int $governorate_id,
        public string $name,
        public string $code,
        public ?string $address = null,
        public ?string $phone = null,
        public ?float $latitude = null,
        public ?float $longitude = null,
        public ?string $allowed_ip_range = null,
        public bool $is_active = true
    ) {}
}
