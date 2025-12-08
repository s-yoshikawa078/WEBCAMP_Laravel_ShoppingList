<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;

class UserController extends Controller
{
    // 会員登録画面
    public function index()
    {
        return view('user.register');
    }

    // 会員登録処理
    public function register(RegisterUserRequest $request)
    {
        // $request->validated() は不要、RegisterUserRequest が自動でバリデーションを実行
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 登録後はログイン画面にリダイレクト
        return redirect()->route('login')->with('success', 'ユーザ登録が完了しました！！');
    }
}