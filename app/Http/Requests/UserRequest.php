<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
            
        'roles' => 'required|array',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'email is required',
            'password.required' => 'password is required',
           
            'roles.required' => 'role is required',
            
        ];
    }
}
