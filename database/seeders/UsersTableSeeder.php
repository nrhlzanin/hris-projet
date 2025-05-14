<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => Str::uuid(),
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
            ],
            [
                'id' => Str::uuid(),
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
            ],
        ]);
    }
}

