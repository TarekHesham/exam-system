<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignTeacherToSchoolsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'school_ids'      => 'required|array',
            'school_ids.*'    => 'exists:schools,id',
            'assignment_type' => 'sometimes|in:teaching,supervision,correction',
        ];
    }

    public function messages(): array
    {
        return [
            'school_ids.required' => 'يجب اختيار مدرسة واحدة على الأقل.',
            'school_ids.array'    => 'قائمة المدارس غير صحيحة.',
            'school_ids.*.exists' => 'بعض المدارس غير موجودة.',
            'assignment_type.in'  => 'نوع التكليف يجب أن يكون: teaching, supervision, correction.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'school_ids' => [
                'description' => 'Array of school IDs to assign the teacher to.',
                'example' => [1, 2, 3],
            ],
            'school_ids.*' => [
                'description' => 'Individual school ID where the teacher will be assigned.',
                'example' => 1,
            ],
            'assignment_type' => [
                'description' => 'Type of assignment for the teacher across the selected schools. Defaults to "teaching" if not provided.',
                'example' => 'supervision',
            ],
        ];
    }
}
