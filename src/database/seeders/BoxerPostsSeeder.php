<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxerPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxer_posts')->insert([
            [
                'user_id' => 1,
                'gym_id' => 1,
                'bio' => '世界チャンピオンになる',
                'record_win' => 7,
                'record_lose' => 0,
                'record_draw' => 0,
                'titles' => '全日本新人王',
                'sns_url' => 'https://instagram.com/boxer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        //
    }
}
