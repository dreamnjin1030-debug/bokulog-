<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserPostsSeeder::class,
            GymsSeeder::class,
            BoxerPostsSeeder::class,
            BoardsSeeder::class,
            FollowsSeeder::class,
            UserPostCommentsSeeder::class,
            UserPostCommentsLikeSeeder::class,
            BoxerPostCommentsSeeder::class,
            DonationsSeeder::class,
        ]);
    }
}
