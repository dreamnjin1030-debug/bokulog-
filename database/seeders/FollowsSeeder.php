<?php

namespace Database\Seeders;

use App\Models\USer;
use App\models\Boxer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FollowsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'audience')->get();
        $boxers = Boxer::all();

        foreach ($users as $user) {
            $boxers->random(rand(1, 3))->each(function ($boxer) use ($user) {
                DB::table('follows')->updateOrInsert(
                    [
                        'user_id' => $user->id,
                        'boxer_id' => $boxer->id,
                    ],
                    ['created_at' => now(), 'updated_at' => now()]
                );
            });
        }
    }
}
