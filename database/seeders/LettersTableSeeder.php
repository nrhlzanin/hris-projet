<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LettersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('letters')->insert([
            [
                'id' => Str::uuid(),
                'letter_format_id' => DB::table('letter_formats')->first()->id,
                'user_id' => DB::table('users')->where('email', 'user1@example.com')->value('id'),
                'name' => 'Leave Request',
                'created_at' => now(),
            ],
        ]);
    }
}
