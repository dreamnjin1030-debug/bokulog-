<?php

namespace Database\Seeders;

use App\Models\BoxerPost;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxerPostsLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        BoxerPost::all()->each(function ($post) use ($users) {
            $users->random(rand(0, 5))->each(function ($user) use ($post) {
                DB::table('boxer_posts_like')->updateOrInsert(
                    [
                        'boxer_post_id' => $post->id,
                        'user_id' => $user->id,
                    ],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            });
        });
    }
}
