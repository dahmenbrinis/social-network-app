<?php

namespace App\Http\Livewire\Messages;

use Auth;
use Livewire\Component;
use Livewire\WithPagination;

class MessagesNavBar extends Component
{
    use WithPagination;

//    public $users ;


    public function getListeners()
    {
        $user_id = Auth::id();
        return [
//            "echo-private:App.Models.User.{$user_id},NewOnlineUser" => 'notification',
            'newUser' => '$refresh',
        ];
    }

    public function notification()
    {
//        $this->users = \Auth::user()->friends()->where('state',1)->get();
    }

    public function render()
    {
        $users = Auth::user()->friends()->orderBy('state', 'desc')->paginate(7);
        return view('livewire.messages.messages-nav-bar', compact('users'));
    }

}
