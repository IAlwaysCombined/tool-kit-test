<?php

namespace Database\Factories;

use App\Models\Statement;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Statement>
 */
class StatementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'number' => fake()->numberBetween(1, 1000),
            'file' => fake()->url,
            'client_id' => random_int(1, 10),
        ];
    }
}
