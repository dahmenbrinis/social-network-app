<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Notification;

class FriendRequest extends Notification
{
    use Queueable;

//    private $user ;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
//        if (Auth::user()->hasRequestedFriendInvitation($user))return;
//        $this->user = $user ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the broadcastable representation of the notification.
     *
     * @param mixed $notifiable
     * @return BroadcastMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
//            'user'=>$this->user->only('id','name','profile_photo_path'),
//            'notifications' => $notifiable->notifications()->get(),
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
//            'user'=>$this->user->only('id','name','profile_photo_path'),
        ];
    }
}
