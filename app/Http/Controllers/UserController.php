<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 登録フォーム表示
    public function index()
    {
        return view('user.register');
    }

    // 登録処理
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:4|confirmed', // 4文字でOKに変更済み
    ]); 

    // ユーザ登録
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    // ログイン画面にリダイレクトし、フラッシュメッセージを渡す
    return redirect('/')->with('success', 'ユーザーを登録しました！！');
}
}