<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 誰でもリクエスト可能
    }

    public function rules()
    {
        return [
            'login_id' => 'required|string',
            'password' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'login_id.required' => 'Login ID is required.',
            'password.required' => 'Password is required.',
        ];
    }
}