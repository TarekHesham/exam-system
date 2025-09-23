<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExamQuestionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'exam_id' => ['sometimes', 'integer', 'exists:exams,id'],
            'question_text' => ['nullable', 'string'],
            'question_image' => ['nullable', 'string'],
            'question_type' => ['sometimes', 'string', Rule::in(['multiple_choice', 'essay', 'true_false', 'fill_blank'])],
            'options' => ['nullable', 'array'],
            'options.*' => ['sometimes'],
            'correct_answer' => ['nullable'],
            'points' => ['sometimes', 'integer', 'min:0'],
            'is_required' => ['sometimes', 'boolean'],
            'help_text' => ['nullable', 'string'],
            'section_id' => ['nullable', 'integer', 'exists:exam_sections,id'],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('is_required')) {
            $this->merge(['is_required' => (bool) $this->input('is_required')]);
        }
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->input('question_type') === 'multiple_choice' && empty($this->input('options'))) {
                $validator->errors()->add('options', 'Options are required for multiple_choice question type.');
            }
        });
    }
}
