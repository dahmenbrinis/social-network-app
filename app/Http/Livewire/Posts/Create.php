<?php

namespace App\Http\Livewire\Posts;

use App\Notifications\PostAdded;
use Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Create extends Component
{
    public $title = '';
    public $body = '';
    protected $rules = [
        'title' => 'required|max:50',
        'body' => 'required'
    ];

    public function render()
    {
        return view('livewire.posts.create');
    }

    public function save()
    {
        $data = $this->validate();
        $post = Auth::user()->posts()->create($data);
        $this->emit('postAdded');
        Notification::send(Auth::user()->friends, new PostAdded());
        $this->reset(['title', 'body']);

    }
}
