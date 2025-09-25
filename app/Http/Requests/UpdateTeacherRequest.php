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
            'subject_id' => 'sometimes|string|max:255',
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

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Full name of the teacher.',
                'example' => 'John Doe',
            ],
            'email' => [
                'description' => 'Email address of the teacher (must be unique).',
                'example' => 'teacher@example.com',
            ],
            'phone' => [
                'description' => 'Phone number of the teacher (must be unique).',
                'example' => '01234567890',
            ],
            'national_id' => [
                'description' => 'National ID of the teacher (14 digits, unique).',
                'example' => '12345678901234',
            ],
            'password' => [
                'description' => 'Password for the teacher account (minimum 8 characters).',
                'example' => 'password123',
            ],
            'subject_id' => [
                'description' => 'ID or code of the subject assigned to the teacher.',
                'example' => 'MATH101',
            ],
            'teacher_type' => [
                'description' => 'Type of teacher.',
                'example' => 'regular',
            ],
            'can_create_exams' => [
                'description' => 'Whether the teacher can create exams.',
                'example' => true,
            ],
            'can_correct_essays' => [
                'description' => 'Whether the teacher can correct essay questions.',
                'example' => false,
            ],
            'is_active' => [
                'description' => 'Indicates if the teacher account is active.',
                'example' => true,
            ],
            'school_ids' => [
                'description' => 'Array of school IDs assigned to the teacher.',
                'example' => [1, 2, 3],
            ],
            'school_ids.*' => [
                'description' => 'Individual school ID assigned to the teacher.',
                'example' => 1,
            ],
            'assignment_type' => [
                'description' => 'Type of assignment for the teacher in schools.',
                'example' => 'teaching',
            ],
        ];
    }
}
