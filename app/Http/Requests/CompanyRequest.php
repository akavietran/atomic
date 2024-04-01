<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return ['name' => 'required', 'code' => 'required', 'address' => 'required','department'=>'nullable'];
    }
    public function messages(): array
    {
        return ['name.required' => 'name is required', 'code.required' => 'code is required', 'address.required' => 'address is required'];
    }
}
