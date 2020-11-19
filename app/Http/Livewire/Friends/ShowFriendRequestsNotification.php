<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use App\Notifications\FriendRequest;
use Auth;
use Livewire\Component;

class ShowFriendRequestsNotification extends Component
{
    public $friendRequests;
    public $notificationCount = 0;
    public $screen;

    public function getListeners()
    {
        $user_id = Auth::id();
        return [
            "echo-notification:App.Models.User.{$user_id},FriendRequest" => 'notification',
        ];
    }

    public function initData()
    {
        $this->friendRequests = Auth::user()->friendRequests->reverse();
        $this->notificationCount = Auth::user()->unreadNotifications->where('type', FriendRequest::class)->count();
    }

    public function mount($screen)
    {
        $this->screen = $screen;
        $this->initData();
    }

    public function render()
    {
        return view('livewire.friends.show-friend-requests-notification');
    }

    public function acceptInvitation($user)
    {
        $user = User::find($user);
        $user->friendRequests()->syncWithoutDetaching([Auth::id() => ['confirmed' => 1]]);
        Auth::user()->friendRequests()->syncWithoutDetaching([$user->id => ['confirmed' => 1]]);
        $this->initData();
    }

    public function denyInvitation($user)
    {
        Auth::user()->friendRequests()->detach($user);
        $this->initData();
    }

    public function notificationSeen()
    {
        Auth::user()->unreadNotifications->where('type', FriendRequest::class)->markAsRead();
        $this->notificationCount = 0;
    }

    public function notification($notification)
    {
        if ($notification['type'] == FriendRequest::class) {
            $this->initData();
        }
    }

}
