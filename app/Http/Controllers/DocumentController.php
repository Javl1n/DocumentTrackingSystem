<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\Document;

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
}
