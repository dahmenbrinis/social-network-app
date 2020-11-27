<?php

namespace App\Http\Livewire\Friends;

use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class FriendsList extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $user = Auth::user();
//        dd($user->friends()->get()->pluck('id'));
        $friends = $this->getFriends($user)->paginate(16);

//        dd($friends);
        return view('livewire.friends.friends-list', compact('friends'));
    }

    private function getFriends($user)
    {
        return
            $user->friends()
                ->Where('name', 'like', '%' . $this->search . '%');
//        return ($this->search == '') ?
//            User::whereIn('id', $user->suggestedFriends()->pluck('id')) :
//            User::Where('name', 'like', '%' . $this->search . '%');
    }
}
