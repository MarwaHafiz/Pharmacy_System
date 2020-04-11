<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreDoctorRequest extends FormRequest
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
            //
                'name' => 'required',
                'email' => ['required',
                Rule::unique('doctors', 'email')->ignore($this->doctor),
        ],
                'password' => 'required|min:6',
                'national_id' => ['required',
                Rule::unique('doctors', 'national_id')->ignore($this->doctor),
        ],

                'avatar' => 'image|mimes:jpg,jpeg'
        ];
    }
}
