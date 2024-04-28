<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Passenger;
use \App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('locations')->insert([
            ['city' => 'Kathmandu', 'city_code' => 'KTM', 'name' => 'Kathmandu', 'lat' => '27.7172', 'lng' => '85.3240'],
            ['city' => 'Pokhara', 'city_code' => 'PKR', 'name' => 'Pokhara', 'lat' => '28.2639', 'lng' => '83.9721'],
            ['city' => 'Biratnagar', 'city_code' => 'BIR', 'name' => 'Biratnagar', 'lat' => '26.4719', 'lng' => '87.2797'],
            ['city' => 'Birgunj', 'city_code' => 'BGN', 'name' => 'Birgunj', 'lat' => '27.0004', 'lng' => '84.8723'],
            ['city' => 'Dharan', 'city_code' => 'DHR', 'name' => 'Dharan', 'lat' => '26.8133', 'lng' => '87.2833'],
            ['city' => 'Bharatpur', 'city_code' => 'BRT', 'name' => 'Bharatpur', 'lat' => '27.6881', 'lng' => '84.4296'],
            ['city' => 'Hetauda', 'city_code' => 'HTD', 'name' => 'Hetauda', 'lat' => '27.4167', 'lng' => '85.0333'],
            ['city' => 'Butwal', 'city_code' => 'BTL', 'name' => 'Butwal', 'lat' => '27.7000', 'lng' => '83.4500'],
            ['city' => 'Nepalgunj', 'city_code' => 'NGJ', 'name' => 'Nepalgunj', 'lat' => '28.0512', 'lng' => '81.6188'],
            ['city' => 'Itahari', 'city_code' => 'ITH', 'name' => 'Itahari', 'lat' => '26.6667', 'lng' => '87.2833'],
            ['city' => 'Pokhara', 'city_code' => 'PKR', 'name' => 'Talchowk', 'lat' => '28.2342', 'lng' => '83.8721'],
            ['city' => 'Pokhara', 'city_code' => 'PKR', 'name' => 'Powerhouse', 'lat' => '27.5432', 'lng' => '85.1912'],
            ['city' => 'Pokhara', 'city_code' => 'PKR', 'name' => 'Gongabu', 'lat' => '28.2342', 'lng' => '83.8721'],
            ['city' => 'Pokhara', 'city_code' => 'PKR', 'name' => 'BG MALL', 'lat' => '27.5432', 'lng' => '85.1912'],
        ]);
    }
}
