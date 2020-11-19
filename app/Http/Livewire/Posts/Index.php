<?php

namespace App\Http\Livewire\Posts;

use App\Notifications\PostAdded;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $posts;
    public $postsPaginationSteps;
    public $postsPaginated;
    public $postsCount;
    public $test = false;


    public function getListeners()
    {
        $user_id = Auth::id();
        return [
            "echo-notification:App.Models.User.{$user_id},PostAdded" => 'notification',
            'postAdded' => 'initData',
        ];
    }

    public function mount()
    {
        $this->postsPaginationSteps = 6;
        $this->postsPaginated = $this->postsPaginationSteps;
        $this->initData();
    }

    public function render()
    {
        return view('livewire.posts.index');
    }

    public function notification($notification)
    {
        if ($notification['type'] == PostAdded::class) {
            $this->initData();
        }
    }

    public function showMore()
    {
        $this->postsPaginated += $this->postsPaginationSteps;
        $this->initData();
    }

    public function initData()
    {
//        dump('hit');
        $user = Auth::user();
        $tmpPosts = new Collection();
        $user->friends->each(function ($friend) use (&$tmpPosts) {
            $tmpPosts = $tmpPosts->merge($friend->posts);
        });
        $tmpPosts = $tmpPosts->merge($user->posts);
        $this->postsCount = $tmpPosts->count();
        $this->posts = $tmpPosts->take($this->postsPaginated);
    }
}
