<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // バリデーション追加
        $validatedData = $request->validate([
            'name' => 'required|string|max:128',
            'email' => 'required|string|email|max:254|unique:users,email',
            'password' => 'required|string|confirmed|max:72',
        ]);

        // 登録処理
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('front.user.register')->with('success', 'ユーザ登録が完了しました');
    }
}