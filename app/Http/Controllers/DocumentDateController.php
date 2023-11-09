<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentTemplate;
use Illuminate\Http\Request;

class DocumentDateController extends Controller
{
    public function index(DocumentTemplate $template){
        return view('documents.dates.index', [
            'template'=> $template
        ]);
    }
}
