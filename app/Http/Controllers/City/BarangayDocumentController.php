<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use App\Models\Barangay;
use App\Models\DocumentDate;
use Illuminate\Support\Carbon;

class BarangayDocumentController extends Controller
{
    public function index()
    {
        $totalDocumentToday = DocumentDate::whereDate('created_at', Carbon::today())->count();
        $totalDocument = DocumentDate::count();

        return view('cho.documents.barangays.index', [
            'barangays' => Barangay::all(),
            'today'=> $totalDocumentToday,
            'total'=> $totalDocument,
        ]);
    }
}
