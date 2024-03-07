<?php

namespace Database\Factories;

use App\Models\Candidat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mariage>
 */
class MariageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_mariage' => $this->faker->date,
            'candidat_id' =>Candidat::factory(),
            'marier_id' =>Candidat::factory(),
        ];
    }
}
