<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use App\Notifications\FriendRequest;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class FriendCardActions extends Component
{
    use AuthorizesRequests;
    public $user;
    public $refresh = false;

    public function mount(User $user)
    {
//        dd($user);
        $this->user = $user;
    }

    public function render()
    {
        if ($this->user) {
            return view('livewire.friends.friend-card-actions');
        }
    }

    public function acceptInvitation()
    {
        $this->authorize('acceptFriendRequest', $this->user);
        $this->user->friendRequests()->syncWithoutDetaching([Auth::id() => ['confirmed' => 1]]);
        Auth::user()->friendRequests()->syncWithoutDetaching([$this->user->id => ['confirmed' => 1]]);
        $this->refresh = !$this->refresh;

    }

    public function denyInvitation()
    {
        $this->authorize('denyFriendRequest', $this->user);
        Auth::user()->friendRequests()->detach($this->user);
        $this->refresh = !$this->refresh;

    }

    public function sendInvitation()
    {
        $this->authorize('sendFriendRequest', $this->user);
        $this->user->friendRequests()->syncWithoutDetaching(Auth::user());
        $this->user->notify(new FriendRequest());
        $this->refresh = !$this->refresh;
    }
}
