<?php

namespace Database\Factories;

use App\Models\Commune;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidat>
 */
class CandidatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->userName,
            'prenon' => $this->faker->firstName,
            'date_naissance' => $this->faker->date('yY-m-d'),
            'id_carte_electeur' => $this->faker->unique()->randomNumber(8),
            'photos' => $this->faker->unique()->imageUrl(),
            'commune_id' => Commune::factory(),
            'user_id' => User::factory()
        ];
    }
}
