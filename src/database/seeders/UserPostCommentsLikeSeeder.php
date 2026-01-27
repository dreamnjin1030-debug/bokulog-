<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPostCommentsLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_post_comments_like')->insert([
            [
                'review_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
            ],
        ]);
        //
    }
}
