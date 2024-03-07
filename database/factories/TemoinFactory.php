<?php

namespace Database\Factories;

use App\Models\Candidat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Temoin>
 */
class TemoinFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->firstName,
            'prenom' => $this->faker->userName,
            'candidat_id' => Candidat::factory()
        ];
    }
}
