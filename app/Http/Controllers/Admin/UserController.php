<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // usersテーブルと completedShoppingLists リレーション件数を取得
        $users = User::withCount('completedShoppingLists')->get();
        return view('admin.user_list', compact('users'));
    }
}