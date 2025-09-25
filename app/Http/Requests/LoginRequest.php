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
            'phone'       => 'required_without_all:national_id,email|string|numeric|digits:11',
            'national_id' => 'required_without_all:phone,email|digits:14',
            'email'       => 'required_without_all:phone,national_id|email|max:255',
            'password'    => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required_without_all'        => 'رقم الهاتف مطلوب',
            'phone.numeric'                     => 'رقم الهاتف يجب ان يكون 11 رقم',
            'phone.digits'                      => 'رقم الهاتف يجب ان يكون 11 رقم',
            'national_id.required_without_all'  => 'الرقم القومي مطلوب',
            'national_id.digits'                => 'الرقم القومي يجب ان يكون 14 رقم',
            'email.required_without_all'        => 'البريد الإلكتروني مطلوب',
            'email.email'                       => 'يجب أن يكون البريد الإلكتروني صالحاً',
            'password.required'                 => 'كلمة المرور مطلوبة',
            'password.min'                      => 'كلمة المرور يجب أن تكون 8 أحرف على الأقل',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'phone' => [
                'description' => 'Phone number of the user (11 digits). Required if national_id and email are not provided.',
                'example' => '01010869000',
            ],
            'national_id' => [
                'description' => 'National ID of the user (14 digits). Required if phone and email are not provided.',
                'example' => '01234567891234',
            ],
            'email' => [
                'description' => 'Email address of the user. Required if phone and national_id are not provided.',
                'example' => 'tarek@digitopia.com',
            ],
            'password' => [
                'description' => 'Password of the user (minimum 8 characters).',
                'example' => '12345678',
            ],
        ];
    }
}
