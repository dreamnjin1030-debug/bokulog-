<?php

namespace Database\Seeders;

use App\Models\Gym;
use Illuminate\Database\Seeder;

class GymsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gyms = [
            ['name' => '帝拳ジム', 'address' => '東京都新宿区', 'latitude' => 35.6938, 'longitude' => 139.7034,],
            ['name' => '大橋ジム', 'address' => '神奈川県横浜市', 'latitude' => 35.4658, 'longitude' => 139.6220,],
            ['name' => '角海老宝石ジム', 'address' => '東京都台東区', 'latitude' => 35.7090, 'longitude' => 139.7920,],
        ];

        foreach ($gyms as $gym) {
            Gym::create($gym);
        }
    }
}
