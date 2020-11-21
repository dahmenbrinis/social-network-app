<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getUrl()
    {
        return Storage::disk(env('FILESYSTEM_DRIVER', 'public'))->url($this->url);

    }

    public function imageable()
    {
        return $this->morphTo();
    }
}
