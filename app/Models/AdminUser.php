<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 認証対応

class AdminUser extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['login_id', 'password', 'name'];

    // パスワード自動ハッシュ化
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}