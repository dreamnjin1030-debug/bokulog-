<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('follows')->insert([
            [
                'user_id' => 2, //観客
                'boxer_id' => 1, //ボクサー
                'created_at' => now(), //
            ],
        ]);
        //
    }
}
