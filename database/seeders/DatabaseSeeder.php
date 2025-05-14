<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            CheckClockSettingsTableSeeder::class,
            EmployeesTableSeeder::class,
            SalariesTableSeeder::class,
            LetterFormatsTableSeeder::class,
            LettersTableSeeder::class,
            CheckClockSettingTimesTableSeeder::class,
            CheckClocksTableSeeder::class,
        ]);
    }
}
