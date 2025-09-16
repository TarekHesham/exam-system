<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateTeacherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->user_type === 'ministry_admin';
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'required|string|unique:users,phone|max:20',
            'national_id' => 'required|string|unique:users,national_id|max:20',
            'password' => 'required|string|min:8|confirmed',
            'subject_specialization' => 'required|string|max:255',
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
            'name.required' => 'اسم المعلم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'صيغة البريد الإلكتروني غير صحيحة',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.unique' => 'رقم الهاتف مستخدم من قبل',
            'national_id.required' => 'الرقم القومي مطلوب',
            'national_id.unique' => 'الرقم القومي مستخدم من قبل',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
            'password.confirmed' => 'تأكيد كلمة المرور غير متطابق',
            'subject_specialization.required' => 'تخصص المعلم مطلوب',
        ];
    }
}
