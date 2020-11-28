<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FriendsPolicy
{
    use HandlesAuthorization;

    public function sendFriendRequest(User $user, User $targetUser)
    {
        if ($user->id == $targetUser->id) return false;
        if ($targetUser == null) return false;
        return !($user->hasRequestedFriendInvitation($targetUser) or $user->isFriend($targetUser));
    }

    public function acceptFriendRequest(User $user, User $targetUser)
    {
        if ($user->id == $targetUser->id) return false;
        if ($targetUser == null) return false;
        return !$user->isFriend($targetUser) and $targetUser->hasRequestedFriendInvitation($user);
    }

    public function denyFriendRequest(User $user, User $targetUser)
    {
        if ($user->id == $targetUser->id) return false;
        if ($targetUser == null) return false;
        return !$user->isFriend($targetUser) and $targetUser->hasRequestedFriendInvitation($user);
    }

    public function removeFriend(User $user, User $targetUser)
    {
        if ($user->id == $targetUser->id) return false;
        if ($targetUser == null) return false;
        return $user->isFriend($targetUser);
    }

    public function cancelFriendRequest(User $user, User $targetUser)
    {
        if ($user->id == $targetUser->id) return false;
        if ($targetUser == null) return false;
        return $user->friendRequests->contains($targetUser) or $targetUser->friendRequests->contains($user);
    }


    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function update(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function restore(User $user, User $model)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param User $model
     * @return mixed
     */
    public function forceDelete(User $user, User $model)
    {
        //
    }
}
