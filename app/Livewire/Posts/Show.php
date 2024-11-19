<?php

namespace App\Livewire\Posts;

use App\Events\PostUpdatedEvent;
use App\Notifications\PostAdded;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;

class Show extends Component
{
    use AuthorizesRequests;

    public $post;
    public $likes;
    public $commentsCount;
    public $update;

    public function getListeners()
    {
        return [
            "echo-private:postUpdated.{$this->post->id},PostUpdatedEvent" => 'initData',
            'postUpdated' => 'initData',
            'commentAdded' => 'initData',
        ];

    }

    public function render()
    {
        return view('livewire.posts.show');
    }

    public function mount($post)
    {
        $this->initData();
        $this->post = $post;
    }

    public function initData()
    {
        $this->likes = $this->post->reactions->count();
        $this->commentsCount = $this->post->comments->count();
    }

    public function delete()
    {
        $this->authorize('delete', $this->post);
        $this->post->delete();
        $this->dispatch('postAdded');
        Notification::send(Auth::user()->friends, new PostAdded());
    }

    public function like()
    {
//        dump('hit');
        if ($this->post->isReactedBy(Auth::user())) {
            Auth::user()->reactions()->detach($this->post);
        } else {
            Auth::user()->reactions()->attach($this->post);
        }
        $this->initData();
        event(new PostUpdatedEvent($this->post->id));
        $this->dispatch('postUpdated');
    }
}
