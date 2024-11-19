<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class Update extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function update()
    {

    }

    public function render()
    {
        return view('livewire.posts.update');
    }
}
