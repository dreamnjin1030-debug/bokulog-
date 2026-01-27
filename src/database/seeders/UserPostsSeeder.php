<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_posts')->insert([
            'name' => 'ボクサー太郎',
            'email' => 'boxer@example.com',
            'password' => Hash::make('password'),
            'role' => 'boxer',
            'age' => 25,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('user_posts')->insert([
            'name' => '観客花子',
            'email' => 'audience@example.com',
            'password' => Hash::make('password'),
            'role' => 'audience',
            'age' => 30,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
