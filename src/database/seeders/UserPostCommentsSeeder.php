<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserPostCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_post_comments')->insert([
            [
                'boxer_id' => 1,
                'user_id' => 2,
                'rating' => 4,
                'comment' => '試合が熱かった！',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        //
    }
}
