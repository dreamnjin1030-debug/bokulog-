<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxerPostCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxer_post_comments')->insert([
            [
                'board_id' => 1,
                'user_id' => 2,
                'comment' => 'YouTube見ました!応援しています!',
                'created_at' => now(),
            ],
        ]);
        //
    }
}
