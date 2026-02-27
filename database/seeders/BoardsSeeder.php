<?php

namespace Database\Seeders;

use App\Models\Board;
use App\Models\User;
use App\Models\Boxer;
use Illuminate\Database\Seeder;

class BoardsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $boxers = Boxer::all();

        foreach ($boxers as $boxer) {
            Board::create([
                'boxer_id' => $boxer->id,
                'user_id' => $users->random()->id,
                'comment' => '自由に語りましょう'
            ]);
        }
    }
}
