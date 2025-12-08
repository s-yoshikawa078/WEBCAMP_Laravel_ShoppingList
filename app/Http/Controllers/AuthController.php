<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest; // FormRequest をインポート

class AuthController extends Controller
{
    // ログイン画面を表示
    public function index()
    {
        return view('auth.login'); // login.blade.php を表示
    }

    // ログイン処理
    public function login(UserLoginRequest $request) // Request ではなく UserLoginRequest に変更
    {
        // FormRequest でバリデーション済みなので $request->validated() は不要
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // ログイン成功
            return redirect()->intended('/shopping_list/list');
        }

        // ログイン失敗（英語メッセージ）
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email'));
    }

    // ログアウト処理
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}