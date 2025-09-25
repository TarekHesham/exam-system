<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSchoolRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'governorate_id' => 'required|exists:governorates,id',
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:schools,code,' . $this->route('school'),
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:20',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'allowed_ip_range' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'governorate_id.required' => 'المحافظة مطلوبة',
            'governorate_id.exists' => 'المحافظة غير صحيحة',
            'name.required' => 'الاسم مطلوب',
            'name.string' => 'الاسم يجب ان يكون نص',
            'name.max' => 'الاسم يجب ان يكون اقل من 255 حرف',
            'code.required' => 'الكود مطلوب',
            'code.string' => 'الكود يجب ان يكون نص',
            'code.max' => 'الكود يجب ان يكون اقل من 50 حرف',
            'code.unique' => 'الكود موجود بالفعل',
            'address.string' => 'العنوان يجب ان يكون نص',
            'address.max' => 'العنوان يجب ان يكون اقل من 500 حرف',
            'phone.string' => 'رقم الهاتف يجب ان يكون نص',
            'phone.max' => 'رقم الهاتف يجب ان يكون اقل من 20 حرف',
            'latitude.numeric' => 'خط العرض يجب ان يكون رقم',
            'longitude.numeric' => 'خط الطول يجب ان يكون رقم',
            'allowed_ip_range.string' => 'نطاق الايبي يجب ان يكون نص',
            'allowed_ip_range.max' => 'نطاق الايبي يجب ان يكون اقل من 100 حرف',
            'is_active.boolean' => 'الحالة يجب ان تكون صحيحة',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'governorate_id' => [
                'description' => 'ID of the governorate.',
                'example' => 1,
            ],
            'name' => [
                'description' => 'Name of the school.',
                'example' => 'Al Azhar School',
            ],
            'code' => [
                'description' => 'Unique code of the school.',
                'example' => 'S001',
            ],
            'address' => [
                'description' => 'Address of the school (optional).',
                'example' => '123 Main St',
            ],
            'phone' => [
                'description' => 'Phone number of the school (optional).',
                'example' => '+201234567890',
            ],
            'latitude' => [
                'description' => 'Latitude coordinate of the school (optional).',
                'example' => 30.123456,
            ],
            'longitude' => [
                'description' => 'Longitude coordinate of the school (optional).',
                'example' => 31.654321,
            ],
            'allowed_ip_range' => [
                'description' => 'Allowed IP range for the school (optional).',
                'example' => '192.168.1.1-192.168.1.255',
            ],
            'is_active' => [
                'description' => 'Whether the school is active (optional).',
                'example' => true,
            ],
        ];
    }
}
