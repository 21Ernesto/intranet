<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsManager extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        $news = News::where('title', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.news-manager', compact('news'));
    }
}
