<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SalariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('salaries')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => DB::table('users')->where('email', 'user1@example.com')->value('id'),
                'type' => 1,
                'rate' => 5000.00,
                'efective_date' => now(),
                'created_at' => now(),
            ],
        ]);
    }
}
