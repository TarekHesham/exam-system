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

    public function bodyParameters(): array
    {
        return [
            'exam_id' => [
                'description' => 'ID of the exam this question belongs to.',
                'example' => 1,
            ],
            'question_text' => [
                'description' => 'Text content of the question (optional if question_image is provided).',
                'example' => 'What is the capital of Germany?',
            ],
            'question_image' => [
                'description' => 'URL or path of an image for the question (optional).',
                'example' => 'https://example.com/question1.png',
            ],
            'question_type' => [
                'description' => 'Type of the question.',
                'example' => 'multiple_choice',
            ],
            'options' => [
                'description' => 'Array of options for multiple_choice questions (required if question_type is multiple_choice).',
                'example' => ['Berlin', 'Paris', 'Rome', 'Madrid'],
            ],
            'options.*' => [
                'description' => 'Individual option for multiple_choice question.',
                'example' => 'Berlin',
            ],
            'correct_answer' => [
                'description' => 'Correct answer for the question (format depends on question_type).',
                'example' => 'Berlin',
            ],
            'points' => [
                'description' => 'Points assigned to the question.',
                'example' => 5,
            ],
            'is_required' => [
                'description' => 'Indicates if answering the question is mandatory.',
                'example' => true,
            ],
            'help_text' => [
                'description' => 'Optional hint or guidance for the question.',
                'example' => 'Consider European capitals.',
            ],
            'section_id' => [
                'description' => 'ID of the exam section this question belongs to (optional).',
                'example' => 2,
            ],
        ];
    }
}
