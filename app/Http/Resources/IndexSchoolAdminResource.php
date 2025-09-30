<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexSchoolAdminResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'user' => [
                'id'          => $this->user->id,
                'name'        => $this->user->name,
                'email'       => $this->user->email,
                'phone'       => $this->user->phone,
                'national_id' => $this->user->national_id,
                'is_active'   => $this->user->is_active,
            ],
            'school_admin_id' => $this->id,
            'school'          => $this->school->name,
            'is_active'       => $this->is_active,
            'assigned_at'     => $this->assigned_at,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
            'admin_permissions' => $this->admin_permissions,
        ];
    }
}
