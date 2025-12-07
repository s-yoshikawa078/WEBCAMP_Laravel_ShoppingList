<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;

class HomeController extends Controller
{
    public function index()
    {
        $shopping_lists = ShoppingList::orderBy('created_at', 'desc')->paginate(10);
        return view('home.top', compact('shopping_lists'));
    }
}