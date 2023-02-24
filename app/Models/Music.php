<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'artist_id', 'user_id','album_id'];

    public function Artists()
    {
        return $this->belongsTo(Artist::class);
    }

    public function Paroles()
    {
        return $this->hasMany(Paroles::class);
    }

    public function Album()
    {
        return $this->belongsTo(Album::class);
    }

}


