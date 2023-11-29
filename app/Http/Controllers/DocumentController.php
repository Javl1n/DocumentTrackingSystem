<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Rules\SameFormat;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Barangay $barangay)
    {
        return view('documents.index', [
            'barangay' => $barangay,
            'documents' => Document::where('barangay_id', $barangay->id)->latest()->paginate(25),
        ]);
    }

    public function create(DocumentTemplate $template)
    {
        return view('documents.create', [
            'template' => $template,
        ]);
    }

    public function store(Request $request)
    {   

        $template = DocumentTemplate::where('id', $request->template)->first()->slug;

        // ddd(pathinfo($request->link->getClientOriginalName(), PATHINFO_FILENAME) === $template);

        $request->validate([
            'link' => ['mimes:xls,xlm,xla,xlsx', new SameFormat($template)],
        ]);

        $barangay = BarangayHealthWorker::where('user_id', auth()->user()->id)->first()->barangay;
        $document = Document::where('barangay_id',  $barangay->id)->first();

        DocumentDate::create([
            'document_id' => $document->id,
            'user_id' => auth()->user()->id,
        ]);


        return redirect("/template/$template")->with('success', 'Document Added Successfully');
    }
}
