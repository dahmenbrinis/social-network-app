<?php

namespace App\Http\Livewire\Posts;

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
        $this->validate();
        $data = $this->validate();
        $post = Auth::user()->posts()->create($data);
        $this->emit('postUpdated');
        $this->reset(['title', 'body']);
    }
}
