<?php

namespace App\Livewire\Messages;

use App\Notifications\MessageSent;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowMessagesNotification extends Component
{
    use AuthorizesRequests;

    public $screen;
    public $messages;
    public $notificationCount = 0;

    public function getListeners()
    {
        $user_id = Auth::id();
        return [
            "echo-notification:App.Models.User.{$user_id},MessageSent" => 'notification',
        ];
    }

    public function mount($screen)
    {
//        if (!$screen) $screen = 'large';
        $this->screen = $screen;
        $this->initData();

    }

    public function initData()
    {
//        TODO: group this notifications by the user
        $this->messages = Auth::user()->unreadNotifications->where('type', MessageSent::class);
        $this->notificationCount = Auth::user()->unreadNotifications->where('type', MessageSent::class)->count();
//        dd($this->messages->first());
    }

    public function render()
    {
        return view('livewire.messages.show-messages-notification');
    }


    public function openChatTab($user)
    {
//        $this->authorize('denyFriendRequest', $user);
//        Auth::user()->friendRequests()->detach($user);
        $this->initData();
    }

    public function notificationSeen()
    {
        Auth::user()->unreadNotifications->where('type', MessageSent::class)->markAsRead();
        $this->initData();
    }

    public function notification($notification)
    {
        if ($notification['type'] == MessageSent::class) {
            $this->initData();
        }
    }

}
