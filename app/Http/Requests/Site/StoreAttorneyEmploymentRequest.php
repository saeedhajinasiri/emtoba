<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttorneyEmploymentRequest extends FormRequest
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
            'image' => 'required',
            'gender' => 'required',
            'resume' => 'required',
            'captcha' => 'required|captcha'
        ];
    }
}
