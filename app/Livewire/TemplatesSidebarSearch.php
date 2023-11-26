<?php

namespace App\Livewire;

use App\Models\Document;
use App\Models\DocumentDate;
use App\Models\DocumentTemplate;
use Livewire\Component;

class TemplatesSidebarSearch extends Component
{
    public $search = '';
    protected $documents;

    protected $barangay;

    public function mount($barangay) {
        $this->documents = Document::where('barangay_id', $barangay)->get();
    }

    public function render()
    {
        sleep(1);
        $templates = DocumentTemplate::search($this->search)->get();

        return view('livewire.templates-sidebar-search', [
            'documents' => $this->documents,
            'templates' => $templates,
            'barangay' => $this->barangay
        ]);
    }
}
