<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([

            //ユーザー
            UsersSeeder::class,

            //マスタ・依存なし
            GymsSeeder::class,

            //ボクサー（User依存）
            BoxersSeeder::class,

            //User投稿系
            UserPostsSeeder::class,
            UserPostCommentSeeder::class,
            UserPostLikesSeeder::class,

            //Boxer投稿系
            BoxerPostsSeeder::class,
            BoxerPostCommentSeeder::class,
            BoxerPostsLikeSeeder::class,

            //掲示板(User / Boxerを使う)
            BoardsSeeder::class,

            //関係系
            FollowsSeeder::class,
            DonationsSeeder::class,

        ]);
        //
    }
}
