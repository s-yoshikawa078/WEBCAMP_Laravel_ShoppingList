<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // true にしておく
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:128',
            'email' => 'required|string|email|max:254|unique:users,email',
            'password' => 'required|string|confirmed|max:72',
        ];
    }
}
