<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'birth_certificate_number' => 'required',
            'national_code' => 'required',
            'birth_place' => 'required',
            'phone' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'description' => 'required',
            'captcha' => 'required|captcha'
        ];
    }
}
