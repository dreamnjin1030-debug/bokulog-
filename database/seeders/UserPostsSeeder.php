<?php

namespace Database\Seeders;

use App\models\User;
use App\Models\Boxer;
use App\Models\UserPost;
use Illuminate\Database\Seeder;

class UserPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $audiences = User::Where('role', 'audience')->get();
        $boxers = Boxer::all();

        foreach ($audiences as $user) {
            UserPost::factory()
                ->count(rand(1, 3))
                ->create([
                    'user_id' => $user->id,
                    'boxer_id' => $boxers->random()->id,
                ]);
        }
    }
}
