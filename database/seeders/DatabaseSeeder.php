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
        $admin = User::factory()->create([
            'name' => 'Frank Leimbergh D. Armodia',
            'email' => 'farmodia@gmail.com',
            'password' => bcrypt('admin123'),
            'contact_number' => '09123456789',
            'user_type' => 'CHO',
        ]);

        CityHealthWorker::factory()->create([
            'user_id' => $admin->id,
            'admin' => 1
        ]);

        $barangay1 = Barangay::factory()->create([
            'name' => 'Apopong'
        ]);

        Barangay::factory()->create([
            'name' => 'Uhaw'
        ]);

        $bhw1 = User::factory()->create([
            'name' => 'Vonne Egonio',
            'email' => 'vonne@gmail.com',
            'password' => bcrypt('admin123'),
            'contact_number' => '09123456789',
            'user_type' => 'BHW',
        ]);

        BarangayHealthWorker::create([
            'user_id' => $bhw1->id,
            'barangay_id' => $barangay1->id
        ]);

        BarangayHealthWorker::create([
            'user_id' => $bhw1->id,
            'barangay_id' => $barangay1->id
        ]);

        DocumentTemplate::factory(10)->create();

        DocumentTemplate::all()
            ->map(
                fn($template)  =>
                Document::firstOrCreate([
                    'document_template_id' => $template->id,
                    'barangay_id' =>  $barangay1->id,
                ])
            );

        Document::all()
            ->map(
                fn($document) =>
                    DocumentDate::create([
                        'document_id'=> $document->id,
                        'user_id'=> $bhw1->id,
                    ])
            );

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}