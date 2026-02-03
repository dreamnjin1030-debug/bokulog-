<?php

namespace Database\Seeders;

use App\Models\UserPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPostsLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        UserPost::all()->each(function ($post) use ($users) {
            $users->random(rand(0, 5))->each(function ($user) use ($post) {
                DB::table('user_posts_like')->updateOrInsert(
                    [
                        'user_post_id' => $post->id,
                        'user_id' => $user->id,
                    ],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            });
        });
    }
}
