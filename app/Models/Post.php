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
        return $this->belongsToMany(User::class, 'comments', 'post_id', 'user_id')->withTimestamps()->withPivot('content');

    }

    public function reactions()
    {
        return $this->belongsToMany(User::class, 'reactions', 'post_id', 'user_id');
    }
}
