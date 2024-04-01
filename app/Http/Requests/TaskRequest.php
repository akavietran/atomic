<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'project_id' => 'required',
            'persons' => 'array|required',
            'start_time' => 'required',
            'end_time' => 'required',
            'priority' => 'required',
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',

        ];
    }
    public function messages(): array
    {
        return [
            
        ];
    }
}
