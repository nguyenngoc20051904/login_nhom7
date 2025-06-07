<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StudentsSeeder::class);
        $this->call(TeachersSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(AdminUserSeeder::class);

    }
}
