<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DonationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('donations')->insert([
            [
                'user_id' => 2,
                'boxer_id' => 1,
                'amount' => 1000,
                'payment_type' => 'paypal',
                'created_at' => now(),
            ],
        ]);
        //
    }
}
