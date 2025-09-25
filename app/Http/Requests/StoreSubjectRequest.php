<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:subjects,code',
            'section' => 'nullable|string|max:255',
            'duration_minutes' => 'required|integer|min:1',
            'max_score' => 'required|integer|min:1',
            'has_essay_questions' => 'required|boolean',
            'is_active' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم المادة مطلوب',
            'code.required' => 'كود المادة مطلوب',
            'code.unique' => 'كود المادة مستخدم من قبل',
            'section.required' => 'القسم مطلوب',
            'duration_minutes.required' => 'المدة الزمنية مطلوبة',
            'duration_minutes.integer' => 'المدة الزمنية يجب ان تكون عدد',
            'duration_minutes.min' => 'المدة الزمنية يجب ان تكون عدد على الاقل',
            'max_score.required' => 'الدرجة الكلية مطلوبة',
            'max_score.integer' => 'الدرجة الكلية يجب ان تكون عدد',
            'max_score.min' => 'الدرجة الكلية يجب ان تكون عدد على الاقل',
            'has_essay_questions.required' => 'هل يوجد اسئلة نصية مطلوبة',
            'has_essay_questions.boolean' => 'هل يوجد اسئلة نصية غير صحيحة',
            'is_active.required' => 'حالة المادة مطلوبة',
            'is_active.boolean' => 'حالة المادة غير صحيحة',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Name of the subject.',
                'example' => 'Mathematics',
            ],
            'code' => [
                'description' => 'Unique code of the subject.',
                'example' => 'MATH101',
            ],
            'section' => [
                'description' => 'Section or category of the subject (optional).',
                'example' => 'Science',
            ],
            'duration_minutes' => [
                'description' => 'Default duration of exams for this subject in minutes.',
                'example' => 90,
            ],
            'max_score' => [
                'description' => 'Maximum score achievable in this subject.',
                'example' => 100,
            ],
            'has_essay_questions' => [
                'description' => 'Indicates if the subject includes essay questions.',
                'example' => true,
            ],
            'is_active' => [
                'description' => 'Whether the subject is active.',
                'example' => true,
            ],
        ];
    }
}
