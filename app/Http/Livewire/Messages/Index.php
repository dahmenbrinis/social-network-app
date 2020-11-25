<?php

namespace App\Http\Livewire\Messages;

use Livewire\Component;

class Index extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function getListeners()
    {
        return [
            "echo-private:messageSent.$this->user,MessageSent" => "update",
        ];
    }

    public function render()
    {
        return view('livewire.messages.index');
    }
}
