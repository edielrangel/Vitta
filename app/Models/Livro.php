<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'editora_id',
        'titulo',
        'tipo_autor',
        'subtitulo',
        'edicao',
        'cidade',
        'ano',
        'notas',
        'paginas',
        'volume',
        'isbn',
        'cdd',
        'cdu',
        'categoria',
        'descricao',
        'fisico',
        'preco',
        'origem',
        'dtAquisicao',
        'observacao'
    ];
}
