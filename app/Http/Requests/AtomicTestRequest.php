<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtomicTestRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return ['name' => 'required|string', 'phone' => 'required|string', 'date' => 'required|date', 'gender' => 'required|in:nam,Nữ,Khác', 'role' => 'required|in:1,2,3', 'description' => 'required|string'];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'phone.required' => 'Phone is required',
            'date.required' => 'Date is required',
            'gender.required' => 'Gender is required',
        ];
    }
}
