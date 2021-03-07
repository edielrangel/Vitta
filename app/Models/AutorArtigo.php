<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorArtigo extends Model
{
    use HasFactory;

    protected $fillable = [
        'artigo_id',
        'autor_id'
    ];

}
