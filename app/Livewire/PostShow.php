<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Reply;
use Livewire\Component;

class PostShow extends Component
{
    public $postId;

    public $replyContent;

    protected $rules = [
        'replyContent' => 'required|min:5',
    ];

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function render()
    {
        $post = Post::findOrFail($this->postId);
        $replies = Reply::where('post_id', $this->postId)->latest()->paginate(10);

        return view('livewire.post-show', ['post' => $post, 'replies' => $replies])->layout('layouts.students');
    }

    public function submitReply()
    {
        $this->validate();

        $reply = new Reply();
        $reply->content = $this->replyContent;
        $reply->post_id = $this->postId;
        $reply->user_id = auth()->user()->id;
        $reply->save();

        session()->flash('message', 'Tu respuesta ha sido publicada.');

        $this->replyContent = '';
    }
}
