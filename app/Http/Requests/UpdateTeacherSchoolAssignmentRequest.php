<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherSchoolAssignmentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assignment_type' => 'sometimes|in:teaching,supervision,correction',
            'is_active'       => 'sometimes|boolean',
            'assigned_at'     => 'nullable|date',
        ];
    }

    public function messages()
    {
        return [
            'assignment_type.in' => 'The assignment type must be teaching, supervision or correction.',
            'is_active.boolean'  => 'The is_active field must be true or false.',
            'assigned_at.date'   => 'The assigned_at field must be a valid date.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'assignment_type' => [
                'description' => 'Updated type of assignment for the teacher.',
                'example' => 'supervision',
            ],
            'is_active' => [
                'description' => 'Whether the assignment is active or not.',
                'example' => false,
            ],
            'assigned_at' => [
                'description' => 'Date when the teacher was (re)assigned (optional).',
                'example' => '2025-10-01',
            ],
        ];
    }
}
