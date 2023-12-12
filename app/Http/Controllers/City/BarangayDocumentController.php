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
        $today['total'] = DocumentDate::whereDate('created_at', Carbon::today())->count();
        $yesterday['total'] = DocumentDate::whereDate('created_at', Carbon::today()->subDay())->count();
        $dayBefore = DocumentDate::whereDate('created_at', Carbon::today()->subDays(2))->count();
        $totalDocument = DocumentDate::count();

        // $today['total'] = 1;
        // $yesterday['total'] = 0;

        $today['positive'] = $today['total'] >= $yesterday['total'];
        
        if( $today['positive'] ) 
        {
            if ( $yesterday['total'] !== 0 )
            {
                $today['percentage'] = ($today['total'] - $yesterday['total']) / $yesterday['total'] * 100;
            }
            else
            {
                $today['percentage'] = 'Infinite';
            }
        } 
        else 
        {
            $today['percentage'] = ($yesterday['total'] - $today['total']) / $yesterday['total'] * 100;
        }

        return view('cho.documents.barangays.index', [
            'barangays' => Barangay::all(),
            'today'=> $today,
            'total'=> $totalDocument,
            'yesterday'=> $yesterday,
        ]);
    }
}
