<?php

namespace App\Http\Livewire\Posts;

use App\Notifications\PostAdded;
use Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title = '';
    public $body = '';
    public $images;
    protected $rules = [
        'title' => 'required|max:50',
        'body' => 'required',
        'image.*' => 'nullable|image|max:25000',
    ];

    public function render()
    {
        return view('livewire.posts.create');
    }

    public function save()
    {
        $data = $this->validate();
//        dd($data);
        $post = Auth::user()->posts()->create($data);
        foreach ($this->images as $image) {
            $post->images()->create(['url' => $image->storePublicly('photos', 'public')]);
        }
        $this->emit('postAdded');
        Notification::send(Auth::user()->friends, new PostAdded());
        $this->reset(['title', 'body']);

    }
}
