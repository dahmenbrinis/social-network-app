<?php

namespace App\Http\Livewire\Posts;

use App\Events\PostUpdatedEvent;
use Auth;
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
//        dd($data);
        $post = Auth::user()->posts()->create($data);
        $this->emit('postUpdated');
        event(new PostUpdatedEvent());
        $this->reset(['title', 'body']);
    }
}
