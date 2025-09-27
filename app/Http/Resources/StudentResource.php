<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        return [
            'id'             => $this->id,
            'name'           => $this->user?->name,
            'email'          => $this->user?->email,
            'phone'          => $this->user?->phone,
            'national_id'    => $this->user?->national_id,
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
            'school' => [
                'id'   => $this->school?->id,
                'name' => $this->school?->name,
                'code' => $this->school?->code,
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
