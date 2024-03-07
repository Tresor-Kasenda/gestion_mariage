<?php

namespace Database\Seeders;

use App\Models\Mariage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MariageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mariage::factory(10)->create();
    }
}
