<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TeacherSchoolAssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'              => $this->id,
            'teacher_id'      => $this->teacher->id,
            'school_id'       => $this->school->id,
            'assignment_type' => $this->assignment_type,
            'is_active'       => $this->is_active,
            'school_name'     => $this->school->name,
            'school_address'  => $this->school->address,
            'teacher_name'    => $this->teacher->user->name,
            'teacher_phone'   => $this->teacher->user->phone,
            'assigned_at'     => $this->assigned_at,
        ];
    }
}
