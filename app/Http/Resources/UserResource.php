<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'national_id' => $this->national_id,
            'user_type' => $this->user_type,
            'is_active' => $this->is_active,
            'email_verified_at' => $this->email_verified_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

        // Add type-specific data
        switch ($this->user_type) {
            case 'student':
                $data += [
                    'student_id'     => $this->student?->id,
                    'student_code'   => $this->student?->student_code,
                    'seat_number'    => $this->student?->seat_number,
                    'academic_year'  => $this->student?->academic_year,
                    'section'        => $this->student?->section,
                    'birth_date'     => $this->student?->birth_date,
                    'gender'         => $this->student?->gender,
                    'guardian_phone' => $this->student?->guardian_phone,
                    'is_banned'      => $this->student?->is_banned,
                    'school' => $this->student?->school ? [
                        'id'   => $this->student->school->id,
                        'name' => $this->student->school->name,
                        'code' => $this->student->school->code,
                        'governorate' => $this->student->school->governorate?->name,
                    ] : null,
                ];
                break;

            case 'teacher':
                $data += [
                    'teacher_id'             => $this->teacher?->id,
                    'teacher_code'           => $this->teacher?->teacher_code,
                    'subject_id' => $this->teacher?->subject_id,
                    'teacher_type'           => $this->teacher?->teacher_type,
                    'can_create_exams'       => $this->teacher?->can_create_exams,
                    'can_correct_essays'     => $this->teacher?->can_correct_essays,
                    'schools' => $this->teacher?->schoolAssignments?->map(function ($assignment) {
                        return [
                            'id'              => $assignment->school->id,
                            'name'            => $assignment->school->name,
                            'assignment_type' => $assignment->assignment_type,
                            'is_active'       => $assignment->is_active,
                        ];
                    })->values()->toArray() ?? [],
                ];
                break;

            case 'school_admin':
                $schoolAdmin = $this->schoolAdmin;
                $data += $schoolAdmin ? [
                    'school_admin_id'   => $schoolAdmin->id,
                    'admin_permissions' => $schoolAdmin->admin_permissions,
                    'is_active'         => $schoolAdmin->is_active,
                    'assigned_at'       => $schoolAdmin->assigned_at,
                    'school' => $schoolAdmin->school ? [
                        'id'          => $schoolAdmin->school->id,
                        'name'        => $schoolAdmin->school->name,
                        'code'        => $schoolAdmin->school->code,
                        'address'     => $schoolAdmin->school->address,
                        'governorate' => $schoolAdmin->school?->governorate?->name,
                    ] : null,
                ] : null;
                break;
        }

        return $data;
    }
}
