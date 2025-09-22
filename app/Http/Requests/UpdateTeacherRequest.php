<?php

namespace App\Http\Requests;

use App\Modules\UserManagement\Models\Teacher;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->user_type === 'ministry_admin';
    }

    public function rules(): array
    {
        $teacherId = $this->route('teacher');
        $teacher = Teacher::with('user')->find($teacherId);
        $userId = $teacher?->user_id;

        return [
            'name' => 'sometimes|string|max:255',
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'phone' => [
                'sometimes',
                'string',
                'max:20',
                Rule::unique('users', 'phone')->ignore($userId),
            ],
            'national_id' => [
                'sometimes',
                'string',
                'digits:14',
                Rule::unique('users', 'national_id')->ignore($userId),
            ],
            'password' => 'sometimes|string|min:8|confirmed',
            'subject_specialization' => 'sometimes|string|max:255',
            'teacher_type' => 'sometimes|in:regular,supervisor',
            'can_create_exams' => 'sometimes|boolean',
            'can_correct_essays' => 'sometimes|boolean',
            'is_active' => 'sometimes|boolean',
            'school_ids' => 'sometimes|array',
            'school_ids.*' => 'exists:schools,id',
            'assignment_type' => 'sometimes|in:teaching,supervision,correction',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',
            'phone.unique' => 'رقم الهاتف مستخدم من قبل',
            'national_id.unique' => 'الرقم القومي مستخدم من قبل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
        ];
    }
}
