<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\CityHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        CityHealthWorker::factory()->for(User::factory()->create([
            'name' => 'Frank Leimbergh D. Armodia',
            'email' => 'farmodia@gmail.com',
            'password' => bcrypt('admin123'),
            'contact_number' => '09123456789',
            'user_type' => 'CHO',
        ]))->create([
            'admin' => 1
        ]);

        $this->call([
            BarangayDocumentSeeder::class
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}