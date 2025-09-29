<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherSchoolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->school->id,
            'name'            => $this->school->name,
            'assignment_type' => $this->assignment_type,
            'is_active'       => $this->is_active,
        ];
    }
}
