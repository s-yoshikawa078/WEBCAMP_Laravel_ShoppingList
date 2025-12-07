<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ログイン画面を表示
    public function index()
    {
        return view('auth.login'); // login.blade.php を表示
    }

public function login(Request $request)
{
    // バリデーション（未入力時の英語メッセージ）
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ], [
        'email.required' => 'The email field is required.',
        'password.required' => 'The password field is required.',
    ]);

    $credentials = $request->only('email', 'password');

    if (auth()->attempt($credentials)) {
        // ログイン成功
        return redirect()->intended('/top');
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