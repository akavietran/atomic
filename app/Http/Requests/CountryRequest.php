<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required',
            'name' => 'required',
            'description' => 'nullable'
        ];
    }
    public function messages(): array
    {
        return [
            'code.required' => 'code is required',
            'name.required' => 'name is required',
        ];
    }
}
