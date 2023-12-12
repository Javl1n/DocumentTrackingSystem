<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;

class DocumentRequestController extends Controller
{
    public function store(Barangay $barangay, $template, $date) 
    {

        $document = $barangay
                        ->documents()
                        ->where(
                            'document_template_id', 
                            DocumentTemplate::where('slug', $template)->first()->id
                        )
                        ->first();

        $date = $document->dates()->where('date', $date)->first();
        
        $date->request()->firstOrCreate();

        return redirect()->back();

        // ddd($date->canAccess->pluck('user_id'));

        // return view('documents.accesses.edit', [
        //     'date' => $date, 
        //     'document' => $document,
        //     'users' => BarangayHealthWorker::whereNot('barangay_id', $barangay->id)->whereNotIn('id', $date->canAccess->pluck('user_id'))->get(),
        // ]);
    }
}
