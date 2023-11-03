<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        return view('documents.index', [
            'documents' => Document::latest()->paginate(10),
        ]);
    }
}