<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminUser;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
    AdminUser::create([
    'login_id' => 'hogemin',
    'password' => 'pass', // bcrypt は不要
    'name' => '管理者',     // 任意で名前も追加可能
]);
    }
}