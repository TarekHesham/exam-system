<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexSchoolResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'address' => $this->address,
            'phone' => $this->phone,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'allowed_ip_range' => $this->allowed_ip_range,
            'is_active' => $this->is_active,
            'governorate' => $this->whenLoaded('governorate', fn() => [
                'id' => $this->governorate->id,
                'name' => $this->governorate->name,
            ]),
        ];
    }
}
