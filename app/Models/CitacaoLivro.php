<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CitacaoLivro extends Model
{
    use HasFactory;

    protected $fillable = [
        'livro_id',
        'capitulo',
        'citacao',
        'pagina',
        'paragrafo',
        'tags',
        'comentario'
    ];
}
