<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CheckClockSettingTimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('check_clock_setting_times')->insert([
            [
                'id' => Str::uuid(),
                'ck_settings_id' => DB::table('check_clock_settings')->first()->id,
                'day' => now(),
                'clock_in' => '09:00:00',
                'clock_out' => '17:00:00',
                'break_start' => '12:00:00',
                'break_end' => '13:00:00',
                'created_at' => now(),
            ],
        ]);
    }
}
