<?php

namespace App\Livewire;

use App\Models\Barangay;
use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Livewire\Component;

class TemplatesSidebarSearch extends Component
{
    public $search = '';
    public $documents;

    public $templates; 

    public Barangay $barangay;

    public function mount(Barangay $barangay) {
        $this->documents = Document::where('barangay_id', $barangay->id)->get();
        $this->barangay = $barangay;
    }

    public function render()
    {
        sleep(1);
        $this->templates = DocumentTemplate::search($this->search)->get();

        return view('livewire.templates-sidebar-search');
    }
}
