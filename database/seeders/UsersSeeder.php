<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 観客
        User::factory()->count(20)->create([
            'role' => 'audience',
        ]);

        // 選手用ユーザー
        User::factory()->count(10)->create([
            'role' => 'boxer',
        ]);
    }
}
