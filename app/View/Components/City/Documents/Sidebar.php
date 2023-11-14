<?php

namespace App\View\Components\City\Documents;

use App\Models\Barangay;
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
    public function __construct(
        public int $barangay,
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {   
        
    $documents = Document::where('barangay_id' , $this->barangay)->get();
        
        return view('components.city.documents.sidebar', [
            'documents' => $documents,
            'documentDates' => DocumentDate::all(),
            'templates' => DocumentTemplate::all(),
            'barangays' => Barangay::all(),
            'currentBarangay' => Barangay::firstWhere('id', request('barangay'))
        ]);
    }
}
