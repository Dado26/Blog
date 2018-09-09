<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->isAdmin();
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
           'password' => 'required|min:6',
           
        ];
        
    }
}
