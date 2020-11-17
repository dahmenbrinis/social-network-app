<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use Auth;
use Livewire\Component;

class ShowFriendRequestsNotification extends Component
{
    public $friendRequests;
    public $notificationAvailable = false;

    public function getListeners()
    {
        $user_id = Auth::id();
        return [
//            'echo:friendRequests.{$this->user_id},FriendRequest'=>'availableRequest',
            "echo-private:friendRequests.{$user_id},FriendRequest" => 'availableRequest',
//            "echo:friendRequests.{$user_id},FriendRequest" => 'availableRequest',
        ];
    }


    public function render()
    {
        $this->friendRequests = Auth::user()->friendRequests->reverse();
        return view('livewire.friends.show-friend-requests-notification');
    }

    public function accept($user)
    {
        $user = User::find($user);
        $user->friendRequests()->syncWithoutDetaching([Auth::id() => ['confirmed' => 1]]);
        Auth::user()->friendRequests()->syncWithoutDetaching([$user->id => ['confirmed' => 1]]);
    }

    public function notificationSeen()
    {
        $this->notificationAvailable = false;
    }

    public function availableRequest()
    {
        $this->notificationAvailable = true;
    }

}
