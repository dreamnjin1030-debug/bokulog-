<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Boxer;
use App\Models\Donation;
use Illuminate\Database\Seeder;

class DonationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::where('role', 'audience')->get();
        $boxers = Boxer::all();

        foreach ($users as $user) {
            Donation::create([
                'user_id' => $user->id,
                'boxer_id' => $boxers->random()->id,
                'amount' => rand(500, 5000),
                'payment_type' => 'paypay',
            ]);
        }
    }
}
