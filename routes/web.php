<?php
declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ShoppingListController;
use App\Http\Controllers\CompletedShoppingListController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;

// ログイン前ルート
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// 会員登録
Route::prefix('/user')->group(function () {
    Route::get('/register', [UserController::class, 'index'])->name('front.user.register');
    Route::post('/register', [UserController::class, 'register'])->name('front.user.register.post');
});

// ログイン後ルート
Route::middleware(['auth'])->group(function () {
    // ログイン後トップページを /shopping_list/list にする
    Route::get('/shopping_list/list', [ShoppingListController::class, 'list'])
        ->middleware('auth')
        ->name('front.list');

    // /top にアクセスされた場合は /shopping_list/list にリダイレクト
    Route::get('/top', function () {
        return redirect('/shopping_list/list');
    });

    // 「買うもの」関連
    Route::prefix('/shopping_list')->group(function () {
        Route::post('/register', [ShoppingListController::class, 'register']);
        Route::delete('/delete/{shopping_list_id}', [ShoppingListController::class, 'delete'])
            ->whereNumber('shopping_list_id')
            ->name('delete');
        Route::post('/complete/{shopping_list_id}', [ShoppingListController::class, 'complete'])
            ->whereNumber('shopping_list_id')
            ->name('complete');
    });

    // 購入済み一覧
    Route::get('/completed_shopping_list/list', [CompletedShoppingListController::class, 'list']);

    // ログアウト
    Route::get('/logout', [AuthController::class, 'logout']);
});

// 管理画面
Route::prefix('/admin')->group(function () {
    Route::get('', [AdminAuthController::class, 'index'])->name('admin.index');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');

    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/top', function () {
            return view('admin.top');
        })->name('admin.top');

        Route::get('/user/list', [AdminUserController::class, 'index'])->name('admin.user.list');

        Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
    });
});