<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreSchoolAdminRequest extends FormRequest
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
            'national_id' => 'required|unique:users,national_id|digits:14',
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
            'national_id.digits' => 'الرقم القومي يجب ان يكون 14 رقم',
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

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Full name of the school admin.',
                'example' => 'Tarek Hesham Sayed ElFarmawy',
            ],
            'email' => [
                'description' => 'Email address of the school admin (must be unique).',
                'example' => 'schooladmin@example.com',
            ],
            'phone' => [
                'description' => 'Phone number of the school admin (must be unique).',
                'example' => '01234567890',
            ],
            'national_id' => [
                'description' => 'National ID of the school admin (14 digits, unique).',
                'example' => '12345678901234',
            ],
            'password' => [
                'description' => 'Password for the school admin account.',
                'example' => 'password123',
            ],
            'password_confirmation' => [
                'description' => 'Confirmation of the password.',
                'example' => 'password123',
            ],
            'school_id' => [
                'description' => 'ID of the school to assign the admin to.',
                'example' => 1,
            ],
            'is_active' => [
                'description' => 'Whether the school admin account should be active.',
                'example' => true,
            ],
            'admin_permissions' => [
                'description' => 'Permissions assigned to the school admin (optional).',
                'example' => [
                    'manage_students' => true,
                    'view_reports' => true,
                    'manage_school_settings' => false,
                    'manage_exams' => true,
                ],
            ],
            'admin_permissions.manage_students' => [
                'description' => 'Allow managing students.',
                'example' => true,
            ],
            'admin_permissions.view_reports' => [
                'description' => 'Allow viewing reports.',
                'example' => true,
            ],
            'admin_permissions.manage_school_settings' => [
                'description' => 'Allow managing school settings.',
                'example' => false,
            ],
            'admin_permissions.manage_exams' => [
                'description' => 'Allow managing exams.',
                'example' => true,
            ],
        ];
    }
}
