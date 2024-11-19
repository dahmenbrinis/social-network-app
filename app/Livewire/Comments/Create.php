<?php

namespace App\Livewire\Comments;

use App\Events\CommentsEvent;
use App\Events\PostUpdatedEvent;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Create extends Component
{
    public $post;
    public $content;
    public $success = false;
    protected $rules = [
        'content' => 'required'
    ];

    public function mount($post)
    {
        $this->content = '';
        $this->post = $post;
    }

    public function save()
    {
        $this->validate();
        $this->post->comments()->create([
            'user_id' => Auth::user()->id,
            'content' => $this->content
        ]);
        $this->reset(['content']);
        session()->flash('message', "added successfully");
        // emit the event .
        $this->dispatch('commentAdded');
        event(new CommentsEvent($this->post->id));
        event(new PostUpdatedEvent($this->post->id));

//        $this->emitUp('add-comment');
    }

    public function render()
    {
        return view('livewire.comments.create');
    }

}
