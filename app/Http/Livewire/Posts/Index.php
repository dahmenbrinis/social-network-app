<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Notifications\PostAdded;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    private $posts;


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
        $this->initData();
    }

    public function render()
    {
        return view('livewire.posts.index', ['posts' => $this->posts]);
    }

    public function notification($notification)
    {
        if ($notification['type'] == PostAdded::class) {
            $this->initData();
        }
    }

    public function initData()
    {
        $user = Auth::user();
        $posts = new Collection();
        $user->friends->each(function ($friend) use (&$posts) {
            $posts = $posts->merge($friend->posts);
        });
        $posts = $posts->merge($user->posts);
        $this->posts = Post::whereIn('id', $posts->pluck('id'))->latest()->paginate(10);
    }
}
