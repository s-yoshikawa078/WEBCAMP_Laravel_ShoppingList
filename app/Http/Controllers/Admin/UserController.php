<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount('completed_shopping_lists')->get();
        return view('admin.user_list', compact('users'));
    }
}