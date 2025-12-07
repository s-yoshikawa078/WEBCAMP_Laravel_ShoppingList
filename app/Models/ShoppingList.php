<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;

protected $casts = [
    'created_at' => 'datetime:Y-m-d', // 日付だけ表示
    'updated_at' => 'datetime:Y-m-d', // 必要ならこちらも
];
}