<?php

namespace App\Http\Livewire\Messages;

use App\Notifications\MessageSent;
use Auth;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class MessagesNavBar extends Component
{
    use WithPagination;

    public $usersChatTabs;


    public function mount()
    {
        $this->usersChatTabs = new Collection();
    }

    public function getListeners()
    {
        $user_id = Auth::id();
        return [
            "echo-notification:App.Models.User.{$user_id},MessageSent" => 'notification',
            'closeChatTab' => 'closeChatTab',
            'newUser' => '$refresh',
        ];
    }

    public function notification($notification)
    {
        if ($notification['type'] == MessageSent::class) {
//            dd($notification['userId']);
            $this->openChatTab($notification['userId']);
        }
    }

    public function openChatTab($user_id)
    {
        if (!$this->usersChatTabs->contains($user_id)) {
            $this->usersChatTabs = $this->usersChatTabs->prepend($user_id)->take(5);
        }
    }

    public function closeChatTab($user_id)
    {
        $this->usersChatTabs = $this->usersChatTabs->filter(function ($value, $key) use ($user_id) {
            return $value != $user_id;
        });
    }


    public function render()
    {
        $users = Auth::user()->friends()->orderBy('state', 'desc')->paginate(8);
        return view('livewire.messages.messages-nav-bar', compact('users'));
    }

}
