<?php

namespace Database\Factories;

use App\Models\Boxer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Boxer>
 */
class BoxerFactory extends Factory
{
    protected $model = Boxer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'win' => fake()->numberBetween(0, 30),
            'lose' => fake()->numberBetween(0, 10),
        ];
    }
}
