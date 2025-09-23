<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateStudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check() && Auth::user()->user_type === 'school_admin';
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'phone' => 'required|string|unique:users,phone|max:20',
            'national_id' => 'required|unique:users,national_id|digits:14',
            'password' => 'required|string|min:8|confirmed',
            'seat_number' => 'sometimes|string|max:20',
            'academic_year' => 'required|in:first,second,third',
            'section' => 'required|in:scientific,literature',
            'birth_date' => 'required|date|before:today',
            'gender' => 'required|in:male,female',
            'guardian_phone' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم الطالب مطلوب',
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
            'academic_year.required' => 'الصف الدراسي مطلوب',
            'section.required' => 'الشعبة مطلوبة',
            'birth_date.required' => 'تاريخ الميلاد مطلوب',
            'birth_date.before' => 'تاريخ الميلاد يجب أن يكون في الماضي',
            'gender.required' => 'الجنس مطلوب',
            'guardian_phone.required' => 'رقم هاتف ولي الأمر مطلوب',
        ];
    }
}
