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
        // Contoh data karyawan dengan NIK sebagai user_id
        DB::table('employees')->insert([
            [
                'id' => Str::uuid(),
                'user_id' => 'f0154f80-4391-4d79-bacd-17825de4ae04',
                'ck_settings_id' => null,
                'first_name' => 'John',
                'last_name' => 'Doe',
                'gender' => 'M',
                'address' => '123 Main Street',
                'position' => 'Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => Str::uuid(),
                'user_id' => '072aa253-f818-454d-9c18-3fdff6d4be23',
                'ck_settings_id' => null,
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'gender' => 'F',
                'address' => '456 Elm Street',
                'position' => 'Developer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
