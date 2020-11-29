<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use App\Notifications\FriendRequest;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class ShowFriendRequestsNotification extends Component
{
    use AuthorizesRequests;
    public $friendRequests;
    public $notificationCount = 0;
    public $screen;
    public $bool = false;

    public function getListeners()
    {
        $user_id = Auth::id();
        return [
            "echo-notification:App.Models.User.{$user_id},FriendRequest" => 'notification',
            'refresh' => '$refresh'
        ];
    }


    public function mount($screen)
    {
        $this->screen = $screen;
    }

    public function render()
    {
        $this->notificationCount = Auth::user()->unreadNotifications->where('type', FriendRequest::class)->count();
        $this->friendRequests = Auth::user()->friendRequests->reverse();
        return view('livewire.friends.show-friend-requests-notification');
    }

    public function acceptInvitation(User $user)
    {
        $this->authorize('acceptFriendRequest', $user);
        $user->friendRequests()->syncWithoutDetaching([Auth::id() => ['confirmed' => 1]]);
        Auth::user()->friendRequests()->syncWithoutDetaching([$user->id => ['confirmed' => 1]]);
//        $this->initData();
//        $this->bool=true;
        $this->notificationSeen();
        $this->emitSelf('refresh');
    }

    public function denyInvitation(User $user)
    {
        $this->authorize('denyFriendRequest', $user);
        Auth::user()->friendRequests()->detach($user);
//        $this->initData();
        $this->notificationSeen();
        $this->emitSelf('refresh');
    }

    public function notificationSeen()
    {
        Auth::user()->unreadNotifications->where('type', FriendRequest::class)->markAsRead();
//        $this->notificationCount = 0;
        $this->emitSelf('refresh');
    }

    public function notification($notification)
    {
        if ($notification['type'] == FriendRequest::class) {

        }
    }

}
