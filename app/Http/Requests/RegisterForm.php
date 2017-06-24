<?php

namespace TaskManager\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterForm extends FormRequest
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
            'email' => 'required|email',
            'name' => 'required|min:5',
            'password' => 'required|confirmed|min:5',
            'password_confirmation' => 'required|min:5',
            'token' => 'required|match'

        ];
    }
}
