<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    // 一覧
    public function list()
    {
        $shopping_lists = ShoppingList::orderBy('created_at', 'desc')->paginate(10);
        return view('shopping_list.list', compact('shopping_lists'));
    }

    // 登録
    public function register(Request $request)
    {
        // バリデーション
        $request->validate([
            'name' => 'required|max:255',
        ]);

        // 登録処理
        $item = new ShoppingList();
        $item->name = $request->name;
        $item->user_id = auth()->id(); // ログインユーザーIDをセット
        $item->save();

        // 成功メッセージをセッションに入れてリダイレクト
        return redirect('/shopping_list/list')->with('success', '「買うもの」を登録しました！！');
    }
}
