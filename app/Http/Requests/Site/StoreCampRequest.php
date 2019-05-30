<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreCampRequest extends FormRequest
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
            'national_code' => 'required',
            'father_name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
//            'year_birth' => 'required',
//            'month_birth' => 'required',
//            'day_birth' => 'required',
            'tel' => 'required',
            'mobile' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'captcha' => 'required|captcha'
        ];
    }
}
