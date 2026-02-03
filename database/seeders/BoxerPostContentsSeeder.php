<?php

namespace Database\Seeders;

use App\Models\BoxerPost;
use App\Models\BoxerPostContent;
use App\Models\user;
use Illuminate\Database\Seeder;

class BoxerPostContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        BoxerPost::all()->each(function ($post) use ($users) {
            BoxerPostContent::create([
                'boxer_post_id' => $post->id,
                'user_id' => $users->random()->id,
                'content' => 'ボクサー投稿の本文ダミーです。',
            ]);
        });
    }
}
