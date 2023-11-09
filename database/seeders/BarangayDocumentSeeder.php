<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangayDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangay = Barangay::factory()->create([
            'name' => 'Apopong'
        ]);

        BarangayHealthWorker::factory()
            ->for($bhw = User::factory()->create([
                'name' => 'Vonne Egonio',
                'email' => 'vonne@gmail.com',
                'password' => bcrypt('admin123'),
                'contact_number' => '09123456789',
                'user_type' => 'BHW',
            ]))
            ->create([
                'barangay_id' => $barangay->id
            ]);

        for($i = 0; $i < 20; $i++)
        {
            DocumentDate::factory()
            ->for(
                Document::factory()
                    ->for(DocumentTemplate::factory()->create(), 'template')
                    ->create([
                        'barangay_id' =>  $barangay->id,
                    ]),
                'document'
            )
            ->create([
                'user_id'=> $bhw->id,
            ]);
        }
    }
}