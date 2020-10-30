<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
        return $this->hasMany(Reaction::class);
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'profile_id1', 'profile_id2')
            ->withTimestamps();
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
