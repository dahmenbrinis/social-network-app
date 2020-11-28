<?php

namespace App\Http\Livewire\Friends;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class FriendsList extends Component
{
    use WithPagination;
    public $search = '';
    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }
    public function render()
    {
        $friends = $this->user
            ->friends()
            ->Where('name', 'like', '%' . $this->search . '%')
            ->simplePaginate(16);
        return view('livewire.friends.friends-list', compact('friends'));
    }
}
