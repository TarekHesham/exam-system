<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateSchoolAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->user_type === 'ministry_admin';
    }

    public function rules(): array
    {
        return [
            'school_id' => 'sometimes|exists:schools,id',
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
            'school_id' => [
                'description' => 'ID of the school to assign the admin to.',
                'example' => 1,
            ],
            'is_active' => [
                'description' => 'Indicates whether the school admin account is active.',
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
