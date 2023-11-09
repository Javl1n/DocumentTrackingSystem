<?php

namespace App\View\Components\Documents;

use App\Models\Barangay;
use App\Models\BarangayHealthWorker;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if (auth()->user()->user_type === 'BHW') {
            $worker = BarangayHealthWorker::where('user_id', auth()->user()->id)->first();
            $documents = Document::where('barangay_id', $worker->barangay_id)->get();
        } else {
            $documents = Document::where('barangay_id' , request(['barangay']))->get();
        }
        return view('components.documents.sidebar', [
            'documents' => $documents,
            'documentDates' => DocumentDate::all(),
            'templates' => DocumentTemplate::all(),
            'barangays' => Barangay::all(),
            'currentBarangay' => Barangay::firstWhere('id', request('barangay'))
        ]);
        // return view('components.documents.sidebar');
    }
}
