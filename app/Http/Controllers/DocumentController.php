<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Barangay $barangay)
    {
        return view('documents.index', [
            'templates' => DocumentTemplate::latest()->paginate(25),
            'barangay' => $barangay,
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
        $user = BarangayHealthWorker::where('user_id', auth()->user()->id)->first();
        $document = Document::firstOrCreate([
            'document_template_id' => $request->template,
            'barangay_id' => $user->barangay_id,
        ]);
        DocumentDate::create([
            'document_id' => $document->id,
            'user_id' => auth()->user()->id,
        ]);

        $template = DocumentTemplate::where('id', $request->template)->first()->slug;

        return redirect("/template/$template")->with('success', 'Document Added Successfully');
    }
}
