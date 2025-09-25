<?php

namespace App\Core\DTOs;

class GovernorateDTO
{
    public int $id;
    public string $name;
    public string $code;
    public bool $is_active;

    public function __construct(int $id, string $name, string $code, bool $is_active)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->is_active = $is_active;
    }
}
