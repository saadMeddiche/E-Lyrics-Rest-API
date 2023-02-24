<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parole extends Model
{
    use HasFactory;
    protected $table = 'paroles';
    protected $fillable = [
        'Parole',
        'Langue',
        'ID_Music',
        'User_Id'
    ];

    public function Musiques()
    {
        return $this->belongsTo(Music::class);
    }
}
