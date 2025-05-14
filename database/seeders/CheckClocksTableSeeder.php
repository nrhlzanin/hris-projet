<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckClocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('check_clocks')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => DB::table('users')->where('email', 'user1@example.com')->value('id'),
                'check_clock_type' => 1,
                'check_clock_time' => '09:00:00',
                'created_at' => now(),
            ],
        ]);
    }
}
