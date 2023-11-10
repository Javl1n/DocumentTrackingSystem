<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use Illuminate\Http\Request;

class BarangayDocumentController extends Controller
{
    public function index()
    {

        return view("cho.documents.barangays.index", [
            "barangays"=> Barangay::all()
        ]);
    }
}
