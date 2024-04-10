<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->admin()->create()->each(function ($user) {
            // Create a BusOperator associated with each operator user
            Admin::factory()->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
