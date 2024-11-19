<?php

namespace App\Livewire\Comments;

use Livewire\Component;

class Show extends Component
{
    public $comment;

    public function render()
    {
        return view('livewire.comments.show');
    }

    public function mount($comment)
    {
        $this->$comment = $comment;
    }
}
