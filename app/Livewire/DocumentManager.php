<?php

namespace App\Livewire;

use App\Models\Document;
use Livewire\Component;

class DocumentManager extends Component
{
    public $search;

    public function render()
    {
        $documents = Document::where('title', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.document-manager', compact('documents'));
    }
}
