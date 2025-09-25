<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            'governorate_id'   => $this->governorate_id,
            'name'             => $this->name,
            'code'             => $this->code,
            'address'          => $this->address,
            'allowed_ip_range' => $this->allowed_ip_range,
            'latitude'         => $this->latitude,
            'longitude'        => $this->longitude,
            'phone'            => $this->phone,
            'is_active'        => $this->is_active,
            'created_at'       => $this->created_at,
            'updated_at'       => $this->updated_at,
        ];
    }
}
