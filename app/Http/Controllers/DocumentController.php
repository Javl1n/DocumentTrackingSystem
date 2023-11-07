<?php

namespace App\Http\Controllers;

use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        // $template =DocumentTemplate::first();
        // $documents = Document::all()->paginate(10);
        // ddd($documents->where('document_template_id', $template->id)->first());
        return view('documents.index', [
            'documents' => Document::paginate(10),
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