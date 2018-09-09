<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'first_name'=> 'required|min:2',
           'last_name'=> 'required|min:2',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'

        ];
    }
}
