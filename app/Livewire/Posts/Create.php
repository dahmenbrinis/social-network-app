<?php

namespace App\Livewire\Posts;

use App\Notifications\PostAdded;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title = '';
    public $body = '';
    public $images;
    public $show = false;
    protected $rules = [
        'title' => 'required|max:50',
        'body' => 'required',
        'images.*' => 'nullable|image|max:25000',
    ];

    public function render()
    {
        return view('livewire.posts.create');
    }


    public function save()
    {

        $data = $this->validate();
        $post = Auth::user()->posts()->create(Arr::except($data, ['images']));

        if ($this->images) {
            foreach ($this->images as $image) {
                $post->images()->create(['url' => $image->storePublicly('photos')]);
                //            dd($post->images->first()->getUrl());
            }
        }

        $this->dispatch('postAdded');
        Notification::send(Auth::user()->friends, new PostAdded());
        $this->reset(['title', 'body']);

    }
}
