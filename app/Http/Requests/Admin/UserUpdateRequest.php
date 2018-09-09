<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $rules = [
           'first_name'=> 'required|min:2',
           'last_name'=> 'required|min:2',
           'email' => 'required|email|unique:users,email,'.request()->user->id,
           
        ];
        
        if(!empty(request()->get('password') )){
            $rules['password'] = 'min:6';
        }
        
        return $rules;
    }
}
