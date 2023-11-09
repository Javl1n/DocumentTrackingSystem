<?php

namespace App\Http\Controllers;

use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DocumentDateController extends Controller
{
    public function index(DocumentTemplate $template){
        // check for barangay id
            if(Gate::allows('cho')){
                $barangay = request(['barangay']);
            } else if (Gate::allows('bhw')){
                $worker = BarangayHealthWorker::where('user_id', auth()->user()->id)->first();
                $barangay = $worker->barangay_id;
            }
        // get documents from templates
        $document = Document::
                        where('barangay_id' , $barangay)
                        ->where('document_template_id', $template->id)
                        ->get();
        // get document dates from documents
        $documentDate = DocumentDate::
                        where('document_id', $document->id)
                        ->get();
        return view('documents.dates.index', [
            'template'=> $template,
            'documents' => $documentDate
        ]);
    }
}