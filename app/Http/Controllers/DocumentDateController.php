<?php

namespace App\Http\Controllers;

use App\Models\BarangayHealthWorker;
use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentHistory;
use App\Models\DocumentTemplate;
use App\Rules\SameFileName;
use App\Rules\SameFormat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

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

    public function show(Barangay $barangay, $template, $date)
    {
        $template = DocumentTemplate::where('slug', $template)->first();
        $date = DocumentDate::where(
            'document_id',
            Document::where('document_template_id', $template->id)
                    ->where('barangay_id', $barangay->id)
                    ->first()->id
        )->where('date', $date)->first();


        
        $mydocument = true;
        if(auth()->user()->can('bhw')){
            $worker = BarangayHealthWorker::where('user_id', auth()->user()->id)->first();
            if($worker->barangay->slug !== $barangay->slug )
            {
                $mydocument = false;
            }
        }  


        return view('documents.dates.show', [
            'template' => $template,
            'document' => $date,
            'barangay' => $barangay,
            'histories' => DocumentHistory::where('document_date_id', $date->id)->orderBy('created_at', 'desc')->get(),
            'myDocument' => $mydocument
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

        $day = 30;

        if (in_array($request->month, [1, 3, 5, 7, 8, 10, 12]))
        {
            $day = 31;
        }
        else if ($request->month === '2')
        {
            $day = 28;
            if($request->year%4 === 0)
            {
                $day = 29;
            }
        }

        $request->validate([
            'link' => ['required', 'mimes:xls,xlm,xla,xlsx,docx', new SameFormat($template->slug)],
            'year' => ['required', 'lte:' . date('Y'),],
            'day'=> ['required', "lte:$day", 'gte:1'],
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

        // $documentWithDate->file()->create([
        //     'url' =>  $request->file('link')->storeAs("documents/$barangay->slug/$template->slug/$date." . $request->link->getClientOriginalExtension())
        // ]);

        $documentWithDate->history()->create([
            'user_id' => auth()->user()->id,
            'version' => $version = 1,
            'description' => "Document Uploaded",
        ])->file()->create([
            'url' =>  $request->file('link')->storeAs("documents/$barangay->slug/$template->slug/$date/v$version." . $request->link->getClientOriginalExtension()),
        ]);


        return redirect(route('documents.dates.index', ['barangay' => $barangay->slug, 'template' => $template->slug]))->with('success', 'Document Added Successfully');
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
        
        $fileExtension = explode('.' ,$date->file->url)[1];

        $file = $template->slug . '-(' . $date->date . ').' . $fileExtension;


        return view('documents.dates.edit', [
            'template' => $template,
            'document' => $document,
            'date'=> $date,
            'file' => $file,
        ]);
    }

    public function update(Barangay $barangay, $date, Request $request)
    {
        $date = DocumentDate::where('id', $request->date)->first();

        $request->validate([
            'link' => ['required', new SameFileName($request->file) ],
            'description' => ['required', 'min:15'],
        ]);

        Storage::delete($date->file->url);

        $request->file('link')->storeAs($date->file->url);

        $date->history()->create([
            'user_id' => auth()->user()->id,
            'description' => $request->description,
        ]);

        return redirect()->route('documents.dates.show', ['barangay' => $date->document->barangay->slug, 'template' => $date->document->template->slug, 'date' => $date->date ])->with('success','');
    }
}