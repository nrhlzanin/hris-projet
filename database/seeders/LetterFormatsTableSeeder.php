<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LetterFormatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('letter_formats')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Leave Application',
                'content' => 'Dear [Manager], I would like to apply for leave...',
                'status' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
