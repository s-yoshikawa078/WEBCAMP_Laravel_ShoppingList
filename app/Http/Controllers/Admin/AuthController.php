<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 管理画面ログイン画面
    public function index()
    {
        return view('admin.login'); // resources/views/admin/login.blade.php
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'login_id' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('admin.top'); // ログイン後Topにリダイレクト
        }

        return back()->withErrors([
            'login_id' => 'ログインIDまたはパスワードが正しくありません',
        ]);
    }

    // ログアウト
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.index'); // 非ログインTopにリダイレクト
    }
}