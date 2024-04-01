<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'role' => 'required',
            
            'description' => 'nullable'
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
