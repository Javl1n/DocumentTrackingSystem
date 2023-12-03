<?php

namespace App\Http\Controllers;

use App\Models\BarangayHealthWorker;
use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use App\Rules\SameFormat;
use Illuminate\Http\Request;
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

    public function show($barangay, $template, $date)
    {
        $barangay = Barangay::where('slug', $barangay)->first();
        $template = DocumentTemplate::where('slug', $template)->first();
        $date = DocumentDate::where(
            'document_id',
            Document::where('document_template_id', $template->id)
                    ->where('barangay_id', $barangay->id)
                    ->first()->id
        )->where('date', $date)->first();

        return view('documents.dates.show', [
            'template' => $template,
            'document' => $date,
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

        $documentWithDate = DocumentDate::create([
            'document_id' => $document->id,
            'user_id' => auth()->user()->id,
            'date' => $date,
        ]);

        $documentWithDate->file()->create([
            'url' =>  $request->file('link')->storeAs("documents/$barangay->slug/$template->slug/$date." . $request->link->getClientOriginalExtension())
        ]);



        return redirect(route('documents.show', ['barangay' => $barangay->slug, 'template' => $template->slug]))->with('success', 'Document Added Successfully');
    }

    public function edit(Barangay $barangay, $template, $date)
    {
        $template = DocumentTemplate::where('slug', $template)->first();
        $document = Document::where('document_template_id', $template->id)
                    ->where('barangay_id', $barangay->id)
                    ->first();
        $date = DocumentDate::where('document_id', $document->id )
                            ->where('date', $date)
                            ->first();
        
        return view('documents.dates.edit', [
            'template' => $template,
            'document' => $document,
            'date'=> $date
        ]);
    }
}