<?php

namespace App\Http\Requests\Site;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
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
            'user_name' => 'required',
            'user_email' => 'required',
            'content' => 'required',
            'captcha' => 'required|captcha'
        ];
    }

    
    /**
     * Create validator instance
     *
     * @param ValidationFactory $factory
     * @return \Illuminate\Validation\Validator
     */
    /*public function validator(ValidationFactory $factory)
    {
        $validator = $factory->make(
            $this->validationData(), $this->rules(),
            $this->messages(), $this->attributes()
        );

        if(\Auth::guest()) {
            $validator->after(function ($v) {
                if (!Captcha::check($this->input('captcha-field'), $this->input('captcha'))) {
                    $v->errors()->add('captcha', trans('validation.captcha'));
                }
            });
        }

        return $validator;
    }*/


}
