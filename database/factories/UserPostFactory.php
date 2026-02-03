<?php

namespace Database\Factories;

use App\Models\UserPost;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserPost>
 */
class UserPostFactory extends Factory
{
    protected $model = UserPost::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'content' => fake()->sentence(),
            'rating'  => fake()->numberBetween(1, 5),
        ];
    }
}
