<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dicionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'termo',
        'significado',
        'referencias',
        'comentarios'
    ];

}
