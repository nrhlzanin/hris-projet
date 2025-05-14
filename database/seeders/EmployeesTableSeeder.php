<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => DB::table('users')->where('email', 'user1@example.com')->value('id'),
                'ck_settings_id' => DB::table('check_clock_settings')->first()->id,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'gender' => 'M',
                'address' => '123 Main St',
                'position' => 'Developer',
            ],
        ]);
    }
}
