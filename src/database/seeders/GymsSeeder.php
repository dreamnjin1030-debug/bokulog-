<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GymsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gyms')->insert([
            [
                'name' => '東京ボクシングジム',
                'address' => '東京都渋谷区',
                'latitude' => 35.6580,
                'longitude' => 139.7016,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        //
    }
}
