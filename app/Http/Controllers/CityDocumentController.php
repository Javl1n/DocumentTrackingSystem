<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;

class CityDocumentController extends Controller
{
    public function index()
    {
        // $template =DocumentTemplate::first();
        // $documents = Document::all()->paginate(10);
        // ddd($documents->where('document_template_id', $template->id)->first());
        
        $documents = Document::where('barangay_id' , request(['barangay']))->get();
        
            return view('cho.documents.index', [
            'documents' => $documents,
            'documentDates' => DocumentDate::all(),
            'templates' => DocumentTemplate::all(),
            'barangays' => Barangay::all(),
            'currentBarangay' => Barangay::firstWhere('id', request('barangay'))
        ]);
    }
}
