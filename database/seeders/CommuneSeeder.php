<?php

namespace Database\Seeders;

use App\Models\Commune;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $communes = [
            'Lubumbashi',
            'Kambemba',
            'Kamalondo',
            'Katuba',
            'Kenya',
            'Annexe',
            'Rwashi'
        ];
        collect($communes)
            ->each(fn($commune) => Commune::query()->create([
                'name' => $commune
            ]));
    }
}
