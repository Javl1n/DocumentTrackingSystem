<?php

namespace Database\Seeders;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\File;
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
        Storage::deleteDirectory('documents');

        $templates = DocumentTemplate::factory(30)->create();

        foreach ($templates as $template) {
            $url = 'templates/' . $template->slug . '.xlsx';
            Storage::copy('seederTemplate.xlsx', $url);
            $template->file()->create([
                'url' => $url,
            ]);
        }

        foreach (Barangay::all() as $barangay) {
            if ($barangay->name !== $barangayMain->name) {
                BarangayHealthWorker::factory()
                    ->for(
                        $user = User::factory()->create([
                            'user_type' => 'BHW',
                            'password' => bcrypt('admin123'),
                        ])
                    )->create([
                            'barangay_id' => $barangay->id
                        ]);
            } else {
                $user = $bhw;
            }
            foreach ($templates as $documentTemplate) {
                $document = Document::factory()->create([
                    'barangay_id' => $barangay->id,
                    'document_template_id' => $documentTemplate->id,
                ]);

                $documentDates = DocumentDate::factory(10)->create([
                    'document_id' => $document,
                    'user_id' => $user->id,
                ]);

                foreach ($documentDates as $date) {
                    $url = "documents/$barangay->slug/$documentTemplate->slug/$date->date.xlsx";
                    Storage::copy("seederTemplate.xlsx", $url);
                    $date->file()->create([
                        "url" => $url,
                    ]);
                    $date->history()->create([
                        'user_id' => $user->id,
                        'description' => "Document Uploaded",
                        'created_at' => date('Y-m-d h:m:s' , strtotime($date->date))
                    ]);
                }
            }
        }
    }
}