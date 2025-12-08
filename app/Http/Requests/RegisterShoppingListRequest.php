<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterShoppingListRequest extends FormRequest
{
    public function authorize()
    {
        return true; // 誰でも実行できるように true に
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255', // 空でないこと＆255文字以内
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'The item name is required.',
        'name.max' => 'The item name must not exceed 255 characters.',
        ];
    }
}