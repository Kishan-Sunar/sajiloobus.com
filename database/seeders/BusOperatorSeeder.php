<?php

namespace Database\Seeders;

use App\Models\BusOperator;
use \App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusOperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->operator()->create()->each(function ($user) {
            // Create a BusOperator associated with each operator user
            BusOperator::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
