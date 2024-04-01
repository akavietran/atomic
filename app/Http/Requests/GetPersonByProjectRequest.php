<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPersonByProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'project_id' => 'required', 
        ];
    }
    public function messages(): array
    {
        return [
          'project_id' => 'required', 

        ];
    }
}
