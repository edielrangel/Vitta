<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitacaoArtigo extends Model
{
    use HasFactory;

    protected $fillable = [
        'artigo_id',
        'capitulo',
        'citacao',
        'pagina',
        'paragrafo',
        'tags',
        'comentario'
    ];
}
