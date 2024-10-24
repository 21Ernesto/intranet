<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    public function render()
    {
        $posts = Post::latest()->paginate(10);

        return view('livewire.post-index', ['posts' => $posts])->layout('layouts.students');
    }
}
