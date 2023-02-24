<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
    protected $table = 'artists';
    protected $fillable = ['name', 'id_user'];

    public function musiques()
    {
        return $this->hasMany(Music::class);
    }
}

