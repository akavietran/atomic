<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'parent_id' => 'nullable',
            'company_id' => 'required',
            'persons.*' => 'required'
            
        ];
    }
    public function messages(): array
    {
        return [
            'code.required' => 'code is required',
            'name.required' => 'name is required',
            'parent_id.required' => 'parent_id is required',
            'company_id.required' => 'company_id is required',
            'persons.required' => 'company_id is required',
        ];
    }
}
