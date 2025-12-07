<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedShoppingList extends Model
{
    use HasFactory;

    // テーブル名
    protected $table = 'completed_shopping_lists';

    // 一括代入可能なカラム
    protected $fillable = ['user_id', 'name'];
}
