<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Spatie\Regex\Regex;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|max:30',
            'email'=>'required',
            'mobile_number'=>['required','regex:/^[0][1-9]\d{9}$|^[1-9]\d{9}$/'],
            'date_of_birth'=>'required',
            'national_id'=>'required',
            'password'=>'required|min:8',
            'confirmPassword'=>'same:password',
        ];
    }

    public function messages()       
    {
        return [
            //
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'mobile_number.required' => 'The mobileNumber field is required.',
            'date_of_birth.required' => 'The dateOfBirth field is required.',
            'national_id.required' => 'The nationalId field is required.',
            'password.required' => 'The password field is required.',
            'userName.max' => 'The userName can not be more than 30 characters.',
            'password.min' => 'The password can not be less than 8 characters.',  
        ];
    }
}
