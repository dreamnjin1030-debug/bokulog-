<?php

namespace Database\Seeders;

use App\Models\UserPost;
use App\Models\UserPostComment;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserPostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        UserPost::all()->each(function ($post) use ($users) {
            UserPostComment::create([
                'user_post_id' => $post->id,
                'user_id' => $users->random()->id,
                'comment' => 'これはダミーの投稿本文です。'
            ]);
        });
    }
}
