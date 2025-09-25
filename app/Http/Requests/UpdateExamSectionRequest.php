<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateExamSectionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'exam_id'      => 'required|integer|exists:exams,id',
            'code'         => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'order_number' => 'required|integer',
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'exam_id' => [
                'description' => 'ID of the exam this section belongs to.',
                'example' => 1,
            ],
            'code' => [
                'description' => 'Unique code for the exam section.',
                'example' => 'SEC-B',
            ],
            'name' => [
                'description' => 'Name of the exam section.',
                'example' => 'Physics Section',
            ],
            'order_number' => [
                'description' => 'Order of the section within the exam.',
                'example' => 2,
            ],
        ];
    }
}
