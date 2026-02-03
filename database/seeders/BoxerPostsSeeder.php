<?php

namespace Database\Seeders;

use App\Models\Boxer;
use App\Models\BoxerPost;
use Illuminate\Database\Seeder;

class BoxerPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Boxer::all()->each(function ($boxer) {
            BoxerPost::factory()
                ->count(rand(1, 3))
                ->create([
                    'boxer_id' => $boxer->id,
                ]);
        });
    }
}
