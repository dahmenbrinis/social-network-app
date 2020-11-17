<?php

use Illuminate\Support\Facades\Broadcast;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int)$user->id === (int)$id;
});

Broadcast::channel('friendRequests.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
Broadcast::channel('postUpdated.{post}', function ($user, $post) {
//    return  $post->user->friends->contains($user);
    return true;
});

Broadcast::channel('commentsUpdated.{post}', function ($user, $post) {
//    return  $post->user->friends->contains($user);
    return true;
});
