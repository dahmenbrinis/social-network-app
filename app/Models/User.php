<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'state'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    public function coverImage()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'reactions', 'user_id', 'post_id')->using(Reaction::class);
    }

    public function friendRequests(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'profile_id1', 'profile_id2')
            ->withTimestamps()->withPivot('confirmed')->withPivot('confirmed')->wherePivot('confirmed', 0);
    }

    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'profile_id2', 'profile_id1')
            ->withTimestamps()->withPivot('confirmed')->wherePivot('confirmed', 1);
    }


    public function isFriend($user): bool
    {
        return (boolean)$this->friends->contains($user);
    }

    public function hasRequestedFriendInvitation($user): bool
    {
        return (boolean)$user->friendRequests->contains($this);
    }

    public function suggestedFriends()
    {
        $friends_suggestion = new Collection();

        $this->friends->each(function ($friend) use (&$friends_suggestion) {
            $friends_suggestion = $friends_suggestion->merge(
                $friend->friends->except($this->friends->push($this)->pluck('id')->toArray())
            );
        });
        return User::whereIn('id', $friends_suggestion->pluck('id'));
    }

    public function friendsPosts()
    {

    }

    // send a message to a specific user this logic should be on the controller side but it is here for the testing purpose .
    public function send_message(User $User, $content)
    {
        return $this->messages_received()->attach($User, ['content' => $content,]);
    }

    // @return the messages sent by the user .
    public function messages_sent()
    {
        return $this->belongsToMany(User::class, 'messages', 'receiver', 'sender')
            ->withTimestamps()
            ->withPivot('content');
    }

    // @return the messages received to the user .
    public function messages_received()
    {
        return $this->belongsToMany(User::class, 'messages', 'sender', 'receiver')
            ->withTimestamps()->withPivot('content');
    }

    public function conversationWith(User $user)
    {
        return Message::where(function ($query) use ($user) {
            $query->where('sender', $user->id)
                ->where('receiver', $this->id);
        })->orWhere(function ($query) use ($user) {
            $query->where('receiver', $user->id)
                ->where('sender', $this->id);
        });
    }
}
