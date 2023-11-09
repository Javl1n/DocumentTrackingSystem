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
            } elseif (Gate::allows('bhw')){
                $worker = BarangayHealthWorker::where('user_id', auth()->user()->id)->first();
                $barangay = $worker->barangay_id;
            }
        // get documents from templates
        // get document dates from documents
        $documentDates = DocumentDate::latest()->
                        where(
                            'document_id',
                            Document::
                                where('barangay_id' , $barangay)
                                ->where('document_template_id', $template->id)
                                ->first()->id
                        )
                        ->get();

        return view('documents.dates.index', [
            'template'=> $template,
            'documents' => $documentDates
        ]);
    }
}
