<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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


    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->belongsToMany(Post::class, 'reactions', 'user_id', 'post_id')->using(Reaction::class);
    }

    public function friendRequests()
    {
        return $this->belongsToMany(User::class, 'friends', 'profile_id1', 'profile_id2')
            ->withTimestamps()->withPivot('confirmed');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'profile_id2', 'profile_id1')
            ->withTimestamps()->withPivot('confirmed');
    }

    public function suggestedFriends()
    {
        $friends_suggestion = new Collection();

        $this->friends->each(function ($friend) use (&$friends_suggestion) {
            $friends_suggestion = $friends_suggestion->merge(
                $friend->friends->except($this->friends->push($this)->pluck('id')->toArray())
            );
        });
        if ($friends_suggestion == null) return null;
        return $friends_suggestion->toQuery();
    }

    public function friendsPosts()
    {

    }

    // send a message to a specific user this logic should be on the controller side but it is here for the testing purpose .
    public function send_message(User $User, $content)
    {
        $this->messages_received()->attach($User, ['content' => $content,]);
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

    public function messages_received_from(User $User)
    {
        return $this->messages_received->where('id', $User->id);
    }

    public function messages_sent_to(User $User)
    {
        return $this->messages_sent->where('id', $User->id);
    }
}
