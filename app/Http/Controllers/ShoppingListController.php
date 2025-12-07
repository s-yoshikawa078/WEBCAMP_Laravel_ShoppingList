<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    // 「買うもの」一覧（仮）
    public function list()
    {
        return view('shopping_list.list'); 
    }
}
