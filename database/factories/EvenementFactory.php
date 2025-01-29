<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->unique()->word,
            'description' => $this->faker->paragraph(),
            'prix' => $this->faker->numberBetween(5000, 200000),
            'date' => $this->faker->date(),
            'lieu' => $this->faker->address(),
        ];
    }
}
