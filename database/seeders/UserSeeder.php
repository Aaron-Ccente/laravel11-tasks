<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Str;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user -> id =1;
        $user -> name = "camilo";
        $user -> email = "camilo@gmail.com";
        $user -> email_verified_at = now();
        $user -> password = password_hash("111", PASSWORD_DEFAULT);
        $user -> save();
    }
}
