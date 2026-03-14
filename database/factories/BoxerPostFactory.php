<?php

namespace Database\Factories;

use App\Models\BoxerPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoxerPost>
 */
class BoxerPostFactory extends Factory
{
    protected $model = BoxerPost::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'comment' => fake()->sentence(),
        ];
    }
}
