<?php

namespace App\Http\Livewire\Friends;

use App\Events\FriendRequest;
use App\Models\User;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    public function addFriend($user)
    {
        $user = User::find($user);
//        $user->friends()->syncWithoutDetaching(Auth::user());
        if (!Auth::user()->hasRequestedFriendInvitation($user)) {
            $user->notify(new \App\Notifications\FriendRequest());
//            dump('sent');
        }
        $user->friendRequests()->syncWithoutDetaching(Auth::user());
//        dump($user->friendRequests);
//        dump(Auth::user()->hasRequestedFriendInvitation($user));
//            event(new FriendRequest($user->id));
//        $this->emit('s');
    }

    public function removeFriend($user)
    {
        $user = User::findOrFail($user);
        $user->friends()->detach(Auth::user());
        Auth::user()->friends()->detach($user);
    }

    private function getFreinds($user)
    {
        return
            $user->friends()->Where('name', 'like', '%' . $this->search . '%');
    }

    private function getSuggestedFriends($user)
    {
        return ($this->search == '') ?
            $user->suggestedFriends() :
            User::Where('name', 'like', '%' . $this->search . '%')->whereNotIn('id', $user->friends->push($user)->pluck('id'));
    }

    public function render()
    {
        $user = Auth::user();
        $friends = $this->getFreinds($user)->paginate(8);
        $suggestedFriends = $this->getSuggestedFriends($user)->paginate(8);
        return view('livewire.friends.index', compact('friends'), compact('suggestedFriends'));
    }

}
