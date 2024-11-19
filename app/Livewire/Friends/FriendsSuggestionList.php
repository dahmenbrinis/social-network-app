<?php

namespace App\Livewire\Friends;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class FriendsSuggestionList extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $user = Auth::user();
        $suggestedFriends = $this->getSuggestedFriends($user)->simplePaginate(16);
        return view('livewire.friends.friends-suggestion-list', compact('suggestedFriends'));
    }

    private function getSuggestedFriends($user)
    {
        return ($this->search == '') ?
            User::whereIn('id', $user->suggestedFriends()->pluck('id')) :
            User::Where('name', 'like', '%' . $this->search . '%');
    }
}
