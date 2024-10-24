<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;

    public $content;

    public $search;

    public $editId;

    public function render()
    {
        $posts = Post::where('title', 'like', '%'.$this->search.'%')->paginate(8);

        return view('livewire.create-post', compact('posts'))->layout('layouts.app');
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string',
            'content' => 'string',
        ]);

        if ($this->editId) {
            $this->updateCategory();
        } else {
            $this->createCategory();
        }

        $this->resetForm();
    }

    private function createCategory()
    {
        Post::create([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
    }

    private function updateCategory()
    {
        $category = Post::findOrFail($this->editId);
        $category->update([
            'title' => $this->title,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
    }

    public function edit($id)
    {
        $this->editId = $id;
        $category = Post::findOrFail($id);
        $this->title = $category->title;
        $this->content = $category->content;
    }

    public function delete($id)
    {
        $category = Post::findOrFail($id);
        $category->delete();
        $this->resetPage();
    }

    public function cancelEdit()
    {
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->title = '';
        $this->content = '';
        $this->editId = null;
    }
}
