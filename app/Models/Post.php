<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);

    }

    public function reactions()
    {
        return $this->belongsToMany(User::class, 'reactions', 'post_id', 'user_id');
    }

    public function isReactedBy(User $user)
    {
        return (boolean)$this->reactions->contains($user);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
