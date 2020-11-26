<?php

namespace App\Policies;

use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MessagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view a message .
     *
     * @param User $user
     * @param Message $message
     * @return boolean
     */
    public function view(User $user, Message $message)
    {
        if ($user == null) return false;
        if ($message == null) return false;
        return (boolean)$message->sender->id == $user->id or $message->receiver->id == $user->id;
    }

    /**
     * Determine whether the user can send a message to the user .
     *
     * @param User $user
     * @param User $receiver
     * @return boolean
     */
    public function send(User $user, Message $message, User $receiver)
    {
//        if ($message == null) return false;
        if ($user == null) return false;
        if ($receiver == null) return false;
        return (boolean)$user->friends->contains($receiver);
    }


}
