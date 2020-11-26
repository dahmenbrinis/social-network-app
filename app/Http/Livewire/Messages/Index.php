<?php

namespace App\Http\Livewire\Messages;

use App\Models\User;
use App\Notifications\MessageSent;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use AuthorizesRequests;
    public $user;
    public $messageBox;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function getListeners()
    {
        $user_id = Auth::id();
        return [
            "echo-notification:App.Models.User.{$user_id},MessageSent" => 'notification',
            'messageSent' => '$refresh',
        ];
    }

    public function notification($notification)
    {
//        dd($notification);
        if ($notification['type'] == MessageSent::class) {
//            $this->initData();
        }
    }

    public function message()
    {
//        $this->authorize('send', $this->user);
        Auth::user()->send_message($this->user, $this->messageBox);
//        dd($messsage);
        $this->reset('messageBox');
        $this->emitSelf('messageSent');
        Notification::send($this->user, new MessageSent(Auth::id()));
    }

    public function closeChatTab()
    {
        $this->emitUp('closeChatTab', $this->user->id);
    }

    public function render()
    {
        $messages = Auth::user()->conversationWith($this->user)->get();
//        dd($messages);
        return view('livewire.messages.index', compact('messages'));
    }
}
