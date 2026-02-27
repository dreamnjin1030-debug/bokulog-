<?php

namespace Database\Seeders;

use App\Models\BoxerPost;
use App\Models\BoxerPostComment;
use App\Models\user;
use Illuminate\Database\Seeder;

class BoxerPostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        BoxerPost::all()->each(function ($post) use ($users) {
            BoxerPostComment::create([
                'boxer_post_id' => $post->id,
                'user_id' => $users->random()->id,
                'comment' => 'ボクサー投稿の本文ダミーです。',
            ]);
        });
    }
}
