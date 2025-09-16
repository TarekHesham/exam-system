<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateSchoolAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->user_type === 'ministry_admin';
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'required|string|unique:users,phone|max:20',
            'national_id' => 'required|string|unique:users,national_id|max:20',
            'password' => 'required|string|min:8|confirmed',
            'school_id' => 'required|exists:schools,id',
            'is_active' => 'sometimes|boolean',
            'admin_permissions' => 'sometimes|array',
            'admin_permissions.manage_students' => 'sometimes|boolean',
            'admin_permissions.view_reports' => 'sometimes|boolean',
            'admin_permissions.manage_school_settings' => 'sometimes|boolean',
            'admin_permissions.manage_exams' => 'sometimes|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم مدير المدرسة مطلوب',
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
            'school_id.required' => 'المدرسة مطلوبة',
            'school_id.exists' => 'المدرسة المحددة غير موجودة',
            'is_active.boolean' => 'حالة المدير المدرسة يجب ان تكون صحيحة',
            'admin_permissions.manage_students.boolean' => 'حقوق المدير المدرسة يجب ان تكون صحيحة',
            'admin_permissions.view_reports.boolean' => 'حقوق المدير المدرسة يجب ان تكون صحيحة',
            'admin_permissions.manage_school_settings.boolean' => 'حقوق المدير المدرسة يجب ان تكون صحيحة',
            'admin_permissions.manage_exams.boolean' => 'حقوق المدير المدرسة يجب ان تكون صحيحة',
        ];
    }
}
