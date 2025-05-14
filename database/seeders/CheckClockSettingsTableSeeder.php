<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckClockSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('check_clock_settings')->insert([
            [
                'id' => Str::uuid(),
                'name' => 'Default Setting',
                'type' => 1,
                'created_at' => now(),
            ],
        ]);
    }
}
