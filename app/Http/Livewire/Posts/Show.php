<?php

namespace App\Http\Livewire\Posts;

use App\Events\PostUpdatedEvent;
use Auth;
use Livewire\Component;

class Show extends Component
{
    public $post;

    public function getListeners()
    {
        return [
            "echo-private:postUpdated.{$this->post->id},PostUpdatedEvent" => '$refresh',
            'postUpdated' => '$refresh',
        ];

    }

    public function render()
    {

        return view('livewire.posts.show');
    }

    public function mount($post)
    {
        $this->post = $post;
    }

    public function like()
    {
        Auth::user()->reactions()->toggle($this->post);
        event(new PostUpdatedEvent($this->post->id));
    }
}
