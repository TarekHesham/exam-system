<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTeacherSchoolAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return  [
            'teacher_id'      => 'required|exists:teachers,id',
            'school_id'       => 'required|exists:schools,id',
            'assignment_type' => 'required|in:teaching,supervision,correction',
            'is_active'       => 'boolean',
            'assigned_at'     => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'teacher_id.required'      => 'Teacher is required',
            'teacher_id.exists'        => 'Teacher does not exist',
            'school_id.required'       => 'School is required',
            'school_id.exists'         => 'School does not exist',
            'assignment_type.required' => 'Assignment type is required',
            'assignment_type.in'       => 'Assignment type is invalid',
            'assigned_at.date'         => 'Assigned at must be a valid date',
            'is_active.boolean'        => 'Is active must be a boolean',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'teacher_id' => [
                'description' => 'ID of the teacher to assign.',
                'example' => 5,
            ],
            'school_id' => [
                'description' => 'ID of the school to assign the teacher to.',
                'example' => 12,
            ],
            'assignment_type' => [
                'description' => 'Type of assignment for the teacher in this school.',
                'example' => 'teaching',
            ],
            'is_active' => [
                'description' => 'Indicates if this assignment is currently active.',
                'example' => true,
            ],
            'assigned_at' => [
                'description' => 'Date when the teacher was assigned to the school (optional).',
                'example' => '2025-09-29',
            ],
        ];
    }
}
