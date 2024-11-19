<?php

namespace App\Livewire\Posts;

use App\Events\PostUpdatedEvent;
use Livewire\Component;

class Delete extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function delete()
    {
//        dd($this->post);
        $this->post->delete();
        $this->dispatch('postUpdated');
        event(new PostUpdatedEvent());
    }

    public function render()
    {
        return view('livewire.posts.delete');
    }
}
