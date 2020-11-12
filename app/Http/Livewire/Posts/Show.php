<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;

class Show extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.posts.show');
    }

    public function mount($post)
    {
        $this->post = $post;
    }
}
