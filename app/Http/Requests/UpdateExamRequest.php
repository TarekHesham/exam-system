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
}
