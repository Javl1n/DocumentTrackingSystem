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

        // ddd(Document::where('barangay_id', $barangay->id)->with([
        //     'dates' => function ($query) { $query->orderBy('document_dates.date','desc')->get();}
        // ])->latest()->paginate(1));

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

        $template = DocumentTemplate::where('id', $request->template)->first();

        // ddd(pathinfo($request->link->getClientOriginalName(), PATHINFO_FILENAME) === $template);

        $request->validate([
            'link' => ['required', 'mimes:xls,xlm,xla,xlsx,docx', new SameFormat($template->slug)],
            'year' => ['required', 'lte:' . date('Y'),],
            'day'=> ['required', 'lte:31', 'gte:1'],
            'month' => ['required', 'lte:12', 'gte:1'],
        ]);

        $date = "$request->year-$request->month-$request->day";


        $barangay = BarangayHealthWorker::where('user_id', auth()->user()->id)->first()->barangay;
        $document = Document::where('barangay_id',  $barangay->id)->where('document_template_id', $template->id)->first();

        // ddd( "$template->slug-$date" );

        DocumentDate::create([
            'document_id' => $document->id,
            'user_id' => auth()->user()->id,
            'date' => $date,
            'url' => $request->file('link')->storeAs("documents/$barangay->slug/$template->slug/$date." . $request->link->getClientOriginalExtension()),
        ]);

        return redirect("/document/$template->slug")->with('success', 'Document Added Successfully');
    }
}
