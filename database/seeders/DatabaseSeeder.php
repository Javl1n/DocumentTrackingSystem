<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Barangay::factory(1)->create([
            'name' => 'Apopong'
        ]);

        $admin = \App\Models\User::factory(1)->create([
            'name' => 'Frank Leimbergh D. Armodia',
            'email' => 'farmodia@gmail.com',
            'password' => bcrypt('admin123'),
            'user_type' => 'CHO',
        ]);

        \App\Models\CityHealthWorker::factory(1)->create([
            'user_id' => $admin->id,
            'admin' => 1
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
