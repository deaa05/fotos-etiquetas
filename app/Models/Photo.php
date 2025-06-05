<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
   use hasFactory;
    protected $fillable = ['title', 'url'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
