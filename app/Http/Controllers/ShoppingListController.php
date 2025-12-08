<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingList;
use App\Models\CompletedShoppingList;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RegisterShoppingListRequest;

class ShoppingListController extends Controller
{
    /**
     * ログインユーザーの「買うもの」一覧を表示
     */
    public function list()
    {
        $user_id = Auth::id();

        $shopping_lists = ShoppingList::where('user_id', $user_id)
            ->orderBy('name', 'asc')
            ->paginate(12);

        return view('shopping_list.list', [
            'shopping_lists' => $shopping_lists
        ]);
    }

    /**
     * 「買うもの」を登録
     */
    public function register(RegisterShoppingListRequest $request)
{
    $user_id = Auth::id();

    \App\Models\ShoppingList::create([
        'user_id' => $user_id,
        'name' => $request->name,
    ]);

    return redirect()->back()->with('success', '「買うもの」を登録しました！！');
}

    /**
     * 「買うもの」を削除
     */
    public function delete($id)
    {
        $item = ShoppingList::findOrFail($id);

        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        $item->delete();

        return redirect('/shopping_list/list')->with('success', '「買うもの」を削除しました！！');
    }

    /**
     * 「買うもの」を完了済みに移動
     */
    public function complete($id)
    {
        $item = ShoppingList::findOrFail($id);

        if ($item->user_id !== Auth::id()) {
            abort(403);
        }

        DB::transaction(function () use ($item) {
            CompletedShoppingList::create([
                'user_id' => $item->user_id,
                'name' => $item->name,
            ]);

            $item->delete();
        });

        return redirect('/shopping_list/list')->with('success', '「買うもの」を完了にしました！！');
    }
}
