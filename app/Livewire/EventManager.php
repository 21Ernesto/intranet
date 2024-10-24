<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class EventManager extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $events = Event::where('title', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.event-manager', compact('events'));
    }
}
