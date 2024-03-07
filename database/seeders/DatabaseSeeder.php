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
        $this->call([
            CommuneSeeder::class,
            UserSeeder::class,
            CandidatSeeder::class,
            ResponsableSeeder::class,
            TemoinSeeder::class,
            MariageSeeder::class
        ]);
    }
}
