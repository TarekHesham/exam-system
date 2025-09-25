<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $exam = $this->route('exam');

        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'start_time' => [
                'sometimes',
                'date',
                $exam && $exam->start_time <= now() ? 'bail' : 'after:now'
            ],
            'end_time' => ['sometimes', 'date', 'after:start_time'],
            'duration_minutes' => ['sometimes', 'integer', 'min:1', 'max:480'],
            'total_score' => ['sometimes', 'integer', 'min:1'],
            'minimum_battery_percentage' => ['sometimes', 'integer', 'min:0', 'max:100'],
            'require_video_recording' => ['sometimes', 'boolean'],
            'is_published' => ['sometimes', 'boolean'],
            'is_active' => ['sometimes', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'title.max' => 'عنوان الامتحان لا يجب أن يتجاوز 255 حرف',
            'description.max' => 'وصف الامتحان لا يجب أن يتجاوز 1000 حرف',
            'start_time.after' => 'وقت بداية الامتحان يجب أن يكون في المستقبل',
            'end_time.after' => 'وقت نهاية الامتحان يجب أن يكون بعد وقت البداية',
            'duration_minutes.min' => 'مدة الامتحان يجب أن تكون دقيقة واحدة على الأقل',
            'duration_minutes.max' => 'مدة الامتحان لا يجب أن تتجاوز 8 ساعات',
            'total_score.min' => 'الدرجة الكلية يجب أن تكون 1 على الأقل'
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $exam = $this->route('exam');

            if ($exam && $exam->start_time <= now() && $exam->is_published) {
                if ($this->hasAny(['start_time', 'end_time', 'duration_minutes', 'total_score'])) {
                    $validator->errors()->add('exam', 'لا يمكن تعديل تفاصيل الامتحان بعد بدءه');
                }
            }
        });
    }

    public function bodyParameters(): array
    {
        return [
            'title' => [
                'description' => 'Title of the exam.',
                'example' => 'Final Exam - Mathematics',
            ],
            'description' => [
                'description' => 'Short description of the exam.',
                'example' => 'Covers chapters 1 to 5.',
            ],
            'start_time' => [
                'description' => 'Start date and time of the exam (must be in the future if exam not started).',
                'example' => '2025-10-01 09:00:00',
            ],
            'end_time' => [
                'description' => 'End date and time of the exam (must be after start_time).',
                'example' => '2025-10-01 11:00:00',
            ],
            'duration_minutes' => [
                'description' => 'Duration of the exam in minutes.',
                'example' => 120,
            ],
            'total_score' => [
                'description' => 'Total score of the exam.',
                'example' => 100,
            ],
            'minimum_battery_percentage' => [
                'description' => 'Minimum allowed battery percentage to enter the exam.',
                'example' => 30,
            ],
            'require_video_recording' => [
                'description' => 'Whether video recording is required during the exam.',
                'example' => true,
            ],
            'is_published' => [
                'description' => 'Indicates if the exam is published.',
                'example' => true,
            ],
            'is_active' => [
                'description' => 'Indicates if the exam is active.',
                'example' => true,
            ],
        ];
    }
}
