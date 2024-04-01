<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchInputRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            
            'search' => 'required', 
        ];
    }
    public function messages(): array
    {
        return [
          'search' => 'required', 
        ];
    }
}
