<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $user = Auth::user();
        $users = $this->getSuggetedFreinds($user)->paginate(16);
        return view('livewire.friends.index', compact('users'));
    }

    private function getSuggetedFreinds($user)
    {
        return ($this->search == '') ?
            User::whereIn('id', $user->suggestedFriends()->pluck('id')) :
            User::Where('name', 'like', '%' . $this->search . '%');
    }
}
