<?php

namespace App\Http\Requests;

use App\Modules\UserManagement\Models\Student;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $studentId = $this->route('student');
        $student   = Student::with('user')->find($studentId);

        $userId = $student?->user_id ?? 0;

        return [
            'name'        => 'sometimes|required|string|max:255',
            'email'       => 'sometimes|required|email|max:255|unique:users,email,' . $userId,
            'phone'       => 'sometimes|required|string|max:20|unique:users,phone,' . $userId,
            'national_id' => 'sometimes|required|digits:14|unique:users,national_id,' . $userId,
            'password'    => 'sometimes|nullable|string|min:8|confirmed',

            'seat_number'    => 'sometimes|nullable|string|max:20',
            'academic_year'  => 'sometimes|required|in:first,second,third',
            'section'        => 'sometimes|required|in:scientific,literature',
            'birth_date'     => 'sometimes|required|date|before:today',
            'gender'         => 'sometimes|required|in:male,female',
            'guardian_phone' => 'sometimes|required|string|max:20',

            'is_banned'  => 'sometimes|boolean',
            'ban_until'  => 'sometimes|nullable|date|after:now',
            'ban_reason' => 'sometimes|nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'email.email'          => 'Invalid email format',
            'email.unique'         => 'Email already taken',
            'phone.unique'         => 'Phone already taken',
            'national_id.digits'   => 'National ID must be 14 digits',
            'national_id.unique'   => 'National ID already taken',
            'password.min'         => 'Password must be at least 8 characters',
            'password.confirmed'   => 'Password confirmation does not match',
            'birth_date.before'    => 'Birth date must be in the past',
            'ban_until.after'      => 'Ban until must be a future date',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'name' => [
                'description' => 'Full name of the student.',
                'example' => 'Tarek Hesham Sayed ElFarmawy',
            ],
            'email' => [
                'description' => 'Unique email address of the student.',
                'example' => 'tarek@example.com',
            ],
            'phone' => [
                'description' => 'Unique phone number of the student.',
                'example' => '+201234567890',
            ],
            'national_id' => [
                'description' => 'National ID (14 digits).',
                'example' => '29801012345678',
            ],
            'password' => [
                'description' => 'Password (if updating). Must be confirmed with `password_confirmation`.',
                'example' => 'Secret1234',
            ],
            'password_confirmation' => [
                'description' => 'Password confirmation (only when updating password).',
                'example' => 'Secret1234',
            ],
            'seat_number' => [
                'description' => 'Seat number assigned to the student (optional).',
                'example' => '2025-001',
            ],
            'academic_year' => [
                'description' => 'Academic year of the student.',
                'example' => 'first',
            ],
            'section' => [
                'description' => 'Section of the student.',
                'example' => 'scientific',
            ],
            'birth_date' => [
                'description' => 'Birth date of the student.',
                'example' => '2005-05-20',
            ],
            'gender' => [
                'description' => 'Gender of the student.',
                'example' => 'male',
            ],
            'guardian_phone' => [
                'description' => 'Phone number of the guardian.',
                'example' => '01112223334',
            ],
            'is_banned' => [
                'description' => 'Whether the student is banned from the system.',
                'example' => false,
            ],
            'ban_until' => [
                'description' => 'Date until which the student is banned (optional).',
                'example' => '2025-12-31',
            ],
            'ban_reason' => [
                'description' => 'Reason for banning the student (optional).',
                'example' => 'Misconduct in exam.',
            ],
        ];
    }
}
