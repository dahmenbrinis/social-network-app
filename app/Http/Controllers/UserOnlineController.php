<?php

namespace App\Http\Controllers;

use App\Models\User;


class UserOnlineController extends Controller
{
    // change the user status 0 if offline and 1 if online ...
    public function online(User $user)
    {
        $user->state = 1;
        $user->save();
    }

    public function offline(User $user)
    {
        $user->state = 0;
        $user->save();
    }
}
