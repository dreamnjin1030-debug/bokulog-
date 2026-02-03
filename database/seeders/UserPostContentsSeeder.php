<?php

namespace Database\Seeders;

use App\Models\UserPost;
use App\Models\UserPostContent;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserPostContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        UserPost::all()->each(function ($post) use ($users) {
            UserPostContent::create([
                'user_post_id' => $post->id,
                'user_id' => $users->random()->id,
                'content' => 'これはダミーの投稿本文です。'
            ]);
        });
    }
}
