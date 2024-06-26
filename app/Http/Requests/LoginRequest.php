<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required'
        ];
    }
    public function messages(): array
    {
        return [
            'role.required' => 'role is required',
            'description.required' => 'description is required',
        ];
    }
}
