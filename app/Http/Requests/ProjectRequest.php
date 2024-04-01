<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'description' => 'required',
            'company_id' => 'required',
            'persons' => 'nullable|array',
            'persons.*' => 'exists:Person,id',
        ];
    }
    public function messages(): array
    {
        return [
            'code.required' => 'code is required',
            'name.required' => 'name is required',
            'description.required' => 'description is required',
            'company_id.required' => 'company_id is required',
            'persons.required' => 'company_id is required',
        ];
    }
}
