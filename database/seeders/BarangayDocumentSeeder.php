<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class BarangayDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barangayName = 'Apopong';

        $barangayMain = Barangay::factory()->create([
            'name' => $barangayName,
            'slug' => Str::slug($barangayName, '-'),
        ]);

        Barangay::factory(9)->create();

        BarangayHealthWorker::factory()
            ->for($bhw = User::factory()->create([
                'name' => 'Vonne Egonio',
                'email' => 'vonne@gmail.com',
                'password' => bcrypt('admin123'),
                'contact_number' => '09123456789',
                'user_type' => 'BHW',
            ]))
            ->create([
                'barangay_id' => $barangayMain->id,
            ]);
        

        Storage::deleteDirectory('templates');

        DocumentTemplate::factory(50)->create();
        
        foreach (Barangay::all() as $barangay) {
            foreach(DocumentTemplate::all() as $documentTemplate) {
                Document::factory()->create([
                    'barangay_id' => $barangay->id,
                    'document_template_id'=> $documentTemplate->id,
                ]);
            }
        }

        // for ($i = 0; $i < 50; $i++) {
        //     DocumentDate::factory()
        //         ->for(
        //             Document::factory()
        //                 ->for(DocumentTemplate::factory()->create(), 'template')
        //                 ->create([
        //                     'barangay_id' => $barangay->id,
        //                 ]),
        //             'document'
        //         )
        //         ->create([
        //             'user_id' => $bhw->id,
        //         ]);
        // }
    }
}
