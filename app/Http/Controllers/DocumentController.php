<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DocumentController extends Controller
{  
    public function index(Barangay $barangay)
    {
        // $template =DocumentTemplate::first();
        // $documents = Document::all()->paginate(10);
        // ddd($documents->where('document_template_id', $template->id)->first());

        $documents = Document::where('barangay_id', $barangay->id)->get();
        

        return view('documents.index', [
            'documents' => $documents,
            'documentDates' => DocumentDate::all(),
            'templates' => DocumentTemplate::all(),
        ]);
    }
    public function create(DocumentTemplate $template) {
        return view("documents.create", [
            "template"=> $template,
        ]);
    }

    public function store(Request $request) {
        $user = BarangayHealthWorker::where('user_id', auth()->user()->id)->first();
        $document = Document::firstOrCreate([
            'document_template_id' => $request->template,
            'barangay_id' =>  $user->barangay_id,
        ]);
        DocumentDate::create([
            'document_id'=> $document->id,
            'user_id'=> auth()->user()->id,
        ]);

        return redirect('')->with('success','Document Added Successfully');
    }
}
