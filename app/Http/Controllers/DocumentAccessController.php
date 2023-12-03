<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentAccessController extends Controller
{
    public function edit(Barangay $barangay, $template, $date) 
    {
        $document = $barangay
                        ->documents()
                        ->where(
                            'document_template_id', 
                            DocumentTemplate::where('slug', $template)->first()->id
                            )
                        ->first();

        $date = $document->dates()->where('date', $date)->first();

        return view('documents.accesses.edit', [
            'date' => $date, 
            'document' => $document,
            'users' => BarangayHealthWorker::whereNot('barangay_id', $barangay->id)->get(), 
        ]);
    }
}
