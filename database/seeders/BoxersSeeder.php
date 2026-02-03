<?php

namespace Database\Seeders;

use App\Models\Boxer;
use App\Models\User;
use App\Models\Gym;
use Illuminate\Database\Seeder;

class BoxersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $boxerUsers = User::where('role', 'boxer')->get();
        $gyms = Gym::all();

        foreach ($boxerUsers as $user) {
            Boxer::factory()->create([
                'user_id' => $user->id,
                'gym_id' => $gyms->random()->id,
                'win' => fake()->numberBetween(0, 30),
                'lose' => fake()->numberBetween(0, 10),
            ]);
        }
    }
}
