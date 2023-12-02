<?php

namespace App\Http\Controllers;

use App\Models\BarangayHealthWorker;
use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Illuminate\Support\Facades\Gate;

class DocumentDateController extends Controller
{
    public function index(Barangay $barangay, $template)
    {   
        $template = DocumentTemplate::where("slug", $template)->first();

        $documentDates = DocumentDate::orderBy('date', 'desc')->
                        where(
                            'document_id',
                            Document::where('barangay_id', $barangay->id)
                                    ->where('document_template_id', $template->id)
                                    ->first()?->id
                        )
                        ->with('publisher')
                        ->get();
                            
        // ddd(getDate(strtotime($documentDates->first()->date)));

        return view('documents.dates.index', [
            'template' => $template,
            'documents' => $documentDates,
            'barangay' => Barangay::where('id' , $barangay->id)->first(),
        ]);
    }
}
