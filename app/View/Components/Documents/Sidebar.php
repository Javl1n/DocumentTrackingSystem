<?php

namespace App\View\Components\Documents;

use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    protected $documents;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public Barangay $barangay,
    ) {
        $this->documents = Document::where('barangay_id', $barangay->id)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.documents.sidebar', [
            'documents' => $this->documents,
            'templates' => DocumentTemplate::latest()->get(),
        ]);
    }
}
