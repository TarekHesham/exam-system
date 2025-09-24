<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateExamRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'exam_type' => ['required', Rule::in(['practice', 'final'])],
            'academic_year' => ['required', Rule::in(['first', 'second', 'third'])],
            'start_time' => ['required', 'date', 'after:now'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'duration_minutes' => ['required', 'integer', 'min:1', 'max:480'],
            'total_score' => ['required', 'integer', 'min:1'],
            'minimum_battery_percentage' => ['nullable', 'integer', 'min:0', 'max:100'],
            'require_video_recording' => ['nullable', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'subject_id.required' => 'المادة مطلوبة',
            'subject_id.exists' => 'المادة المحددة غير موجودة',
            'title.required' => 'عنوان الامتحان مطلوب',
            'title.max' => 'عنوان الامتحان لا يجب أن يتجاوز 255 حرف',
            'description.max' => 'وصف الامتحان لا يجب أن يتجاوز 1000 حرف',
            'exam_type.required' => 'نوع الامتحان مطلوب',
            'exam_type.in' => 'نوع الامتحان يجب أن يكون practice أو final',
            'academic_year.required' => 'السنة الدراسية مطلوبة',
            'academic_year.in' => 'السنة الدراسية يجب أن تكون first أو second أو third',
            'start_time.required' => 'وقت بداية الامتحان مطلوب',
            'start_time.after' => 'وقت بداية الامتحان يجب أن يكون في المستقبل',
            'end_time.required' => 'وقت نهاية الامتحان مطلوب',
            'end_time.after' => 'وقت نهاية الامتحان يجب أن يكون بعد وقت البداية',
            'duration_minutes.required' => 'مدة الامتحان مطلوبة',
            'duration_minutes.min' => 'مدة الامتحان يجب أن تكون دقيقة واحدة على الأقل',
            'duration_minutes.max' => 'مدة الامتحان لا يجب أن تتجاوز 8 ساعات',
            'total_score.required' => 'الدرجة الكلية للامتحان مطلوبة',
            'total_score.min' => 'الدرجة الكلية يجب أن تكون 1 على الأقل',
            'minimum_battery_percentage.min' => 'نسبة البطارية يجب أن تكون 0 على الأقل',
            'minimum_battery_percentage.max' => 'نسبة البطارية لا يجب أن تتجاوز 100%'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'require_video_recording' => $this->boolean('require_video_recording'),
            'minimum_battery_percentage' => $this->input('minimum_battery_percentage') ?: 20
        ]);
    }
}
