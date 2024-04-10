<?php

namespace Database\Seeders;

use App\Models\Passenger;
use \App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->create()->each(function ($user) {
            // Create a BusOperator associated with each operator user
            Passenger::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
