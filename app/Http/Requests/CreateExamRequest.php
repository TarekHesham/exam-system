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
            'created_by' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'exam_type' => ['required', Rule::in(['practice', 'final'])],
            'academic_year' => ['required', Rule::in(['first', 'second', 'third'])],
            'start_time' => ['required', 'date', 'after:now'],
            'end_time' => ['required', 'date', 'after:start_time'],
            'duration_minutes' => ['required', 'integer', 'min:1', 'max:480'],
            'total_score' => ['required', 'integer', 'min:1'],
            'minimum_battery_percentage' => ['integer', 'min:0', 'max:100'],
            'require_video_recording' => ['boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'subject_id.required' => 'المادة مطلوبة',
            'subject_id.exists' => 'المادة المحددة غير موجودة',
            'created_by.required' => 'منشئ الامتحان مطلوب',
            'created_by.exists' => 'منشئ الامتحان غير موجود',
            'title.required' => 'عنوان الامتحان مطلوب',
            'title.max' => 'عنوان الامتحان لا يجب أن يتجاوز 255 حرف',
            'description.max' => 'وصف الامتحان لا يجب أن يتجاوز 1000 حرف',
            'exam_type.required' => 'نوع الامتحان مطلوب',
            'exam_type.in' => 'نوع الامتحان غير صحيح',
            'academic_year.required' => 'السنة الدراسية مطلوبة',
            'academic_year.in' => 'السنة الدراسية غير صحيحة',
            'start_time.required' => 'وقت بداية الامتحان مطلوب',
            'start_time.after' => 'وقت بداية الامتحان يجب أن يكون في المستقبل',
            'end_time.required' => 'وقت نهاية الامتحان مطلوب',
            'end_time.after' => 'وقت نهاية الامتحان يجب أن يكون بعد وقت البداية',
            'duration_minutes.required' => 'مدة الامتحان مطلوبة',
            'duration_minutes.min' => 'مدة الامتحان يجب أن تكون دقيقة على الأقل',
            'duration_minutes.max' => 'مدة الامتحان لا يجب أن تتجاوز 8 ساعات',
            'total_score.required' => 'الدرجة الكلية للامتحان مطلوبة',
            'total_score.min' => 'الدرجة الكلية يجب أن تكون 1 على الأقل'
        ];
    }
}
