<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GetPersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'company_id' => 'required', 
        ];
    }
    public function messages(): array
    {
        return [
          'company_id' => 'required', 

        ];
    }
}
