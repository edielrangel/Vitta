<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gravura extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_gravura',
        'cor',
        'estado',
        'artista',
        'titulo',
        'tiragem',
        'ano_aquisicao',
        'valor',
        'acid',
        'imagem',
        'tumbnail',
        'observacao',
    ];
}
