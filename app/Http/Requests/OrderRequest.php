<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'delivering_address' =>  'required|regex:/(^[-0-9A-Za-z.,\/ ]+$)/',
            'total_price' => 'required',
            'action'=> 'required',
            'is_insures'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'delivering_address.regex' => 'address is incorrect',
            'total_price.required' => 'total_price is required',
        ];
    }
}
