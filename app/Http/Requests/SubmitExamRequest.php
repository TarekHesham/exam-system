<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubmitExamRequest extends FormRequest
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
            'answers' => 'required|array|min:1',
            'answers.*.question_id'  => 'required|integer|exists:exam_questions,id',
            'answers.*.answer_text'  => 'nullable|string',
            'answers.*.answer_image' => 'nullable|string',
            'answers.*.answer_data'  => 'nullable|array',
            'answers.*.time_spent_seconds' => 'nullable|integer|min:0',
            'notes' => 'nullable|string|max:500'
        ];
    }

    public function messages(): array
    {
        return [
            'answers.required'   => 'يجب إرسال إجابة واحدة على الأقل.',
            'answers.array'      => 'تنسيق الإجابات غير صحيح.',
            'answers.min'        => 'يجب أن تحتوي ورقة الإجابة على سؤال واحد على الأقل.',

            'answers.*.question_id.required' => 'رقم السؤال مطلوب.',
            'answers.*.question_id.integer'  => 'رقم السؤال يجب أن يكون صحيح.',
            'answers.*.question_id.exists'   => 'رقم السؤال غير موجود في الامتحان.',

            'answers.*.answer_text.string'   => 'الإجابة النصية يجب أن تكون نص فقط.',
            'answers.*.answer_image.string'  => 'الإجابة بالصور يجب أن تكون بصيغة صحيحة.',
            'answers.*.answer_data.array'    => 'بيانات الإجابة يجب أن تكون بتنسيق صحيح.',

            'answers.*.time_spent_seconds.integer' => 'الوقت يجب أن يكون رقم صحيح بالثواني.',
            'answers.*.time_spent_seconds.min'     => 'الوقت المستغرق لا يمكن أن يكون أقل من صفر.',

            'notes.string' => 'الملاحظات يجب أن تكون نص.',
            'notes.max'    => 'الملاحظات يجب ألا تتجاوز 500 حرف.',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'answers' => [
                'description' => 'List of answers submitted by the student.',
                'example' => [
                    [
                        'question_id'  => 1,
                        'answer_text'  => 'The capital of Egypt is Cairo.',
                        'answer_image' => 'base64_encoded_image_string',
                        'answer_data'  => ['choice' => 'A'],
                        'time_spent_seconds' => 45,
                    ],
                    [
                        'question_id'  => 2,
                        'answer_text'  => null,
                        'answer_image' => null,
                        'answer_data'  => ['selected_options' => [1, 3]],
                        'time_spent_seconds' => 30,
                    ]
                ],
            ],
            'answers.*.question_id' => [
                'description' => 'The ID of the exam question being answered.',
                'example' => 1,
            ],
            'answers.*.answer_text' => [
                'description' => 'The textual answer provided by the student (if applicable).',
                'example' => 'Cairo',
            ],
            'answers.*.answer_image' => [
                'description' => 'Base64 encoded image string for image-based answers (optional).',
                'example' => 'iVBORw0KGgoAAAANSUhEUgAA...',
            ],
            'answers.*.answer_data' => [
                'description' => 'Extra structured data for complex answers (e.g., multiple choices).',
                'example' => ['choice' => 'B'],
            ],
            'answers.*.time_spent_seconds' => [
                'description' => 'Number of seconds the student spent on this question (optional).',
                'example' => 42,
            ],
            'notes' => [
                'description' => 'Optional notes provided by the student about the exam.',
                'example' => 'I had trouble with question 3 due to formatting.',
            ],
        ];
    }
}
