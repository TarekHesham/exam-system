<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'phone'       => 'required_without:national_id,email|string|numeric|digits:11',
            'national_id' => 'required_without:phone,email|string|numeric|digits:14',
            'email'       => 'required_without:phone,national_id|email|max:255',
            'password'    => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required_without' => 'رقم الهاتف مطلوب',
            'phone.numeric' => 'رقم الهاتف يجب ان يكون 11 رقم',
            'phone.digits' => 'رقم الهاتف يجب ان يكون 11 رقم',
            'national_id.required_without' => 'الرقم القومي مطلوب',
            'email.required_without' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'يجب أن يكون البريد الإلكتروني صالحاً',
            'password.required' => 'كلمة المرور مطلوبة',
            'password.min' => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
        ];
    }
}
