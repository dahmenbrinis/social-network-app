<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Message extends Pivot
{
    use HasFactory;
    protected $table = 'messages';

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender', 'id');
    }


    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver', 'id');
    }


}
