<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 会員登録画面
    public function index()
    {
        return view('user.register');
    }

    // 会員登録処理
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:128',
            'email' => 'required|string|email|max:254|unique:users,email',
            'password' => 'required|string|confirmed|max:72',
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login')->with('success', 'ユーザを登録しました！！');
    }
}