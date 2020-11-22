<?php

namespace App\Http\Livewire\UserProfile;

use App\Models\User;
use App\Notifications\PostAdded;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $user;
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

    public function mount($user)
    {
        $this->user = User::findOrFail($user);
        $this->postsPaginationSteps = 6;
        $this->postsPaginated = $this->postsPaginationSteps;
        $this->initData();
    }

    public function initData()
    {
//        dump('hit');
        $this->postsCount = $this->user->posts->count();
        $this->posts = $this->user->posts->take($this->postsPaginated)->reverse();
//        dd($this->posts);
    }

    public function render()
    {
        return view('livewire.user-profile.index');
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
}
