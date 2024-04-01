<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'full_name' => 'required',
            
            'address' =>'required',
            'gender' => 'required',
            'birthdate' => 'required',
            'phone_number' =>'required',
            'user_id' => 'required',
            'company_id' => 'nullable|required',
        ];
    }
    public function messages(): array
    {
        return [
            'full_name.required' => 'full_name is required',
            'gender.required' => 'gender is required',
            'address.required' => 'address is required',
            'birthdate.required' => 'birthdate is required',
            'phonenumber.required' => 'phonenumber is required',
            // 'company_id.required' => 'choose company is required',
            
            
        ];
    }
}