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
                'id' => 'f0154f80-4391-4d79-bacd-17825de4ae04', // UUID yang valid
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'is_admin' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '072aa253-f818-454d-9c18-3fdff6d4be23', // UUID yang valid
                'email' => 'user1@example.com',
                'password' => bcrypt('password'),
                'is_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

