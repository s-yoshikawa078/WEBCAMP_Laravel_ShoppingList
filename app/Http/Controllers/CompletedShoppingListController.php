<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedShoppingList;
use Illuminate\Support\Facades\Auth;

class CompletedShoppingListController extends Controller
{
    /**
     * ログインユーザーの購入済み「買うもの」一覧を表示
     */
    public function list()
    {
        $user_id = Auth::id();

        $completed_lists = CompletedShoppingList::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('shopping_list.completed_list', [
            'completed_lists' => $completed_lists
        ]);
    }
}

