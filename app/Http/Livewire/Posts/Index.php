<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;



    public function render()
    {

        $user = Auth::user();
        $posts = new Collection();
        $user->friends->each(function ($friend) use (&$posts) {
            $posts = $posts->merge($friend->posts);
        });
        $posts = $posts->merge($user->posts);
        $posts = Post::whereIn('id', $posts->pluck('id'))->latest()->paginate(10);

        return view('livewire.posts.index', compact('posts'));
    }
}
