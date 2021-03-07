<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artigo extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'subtitulo',
        'revista',
        'cidade',
        'volume',
        'numero',
        'ano',
        'paginas',
        'resumo',
        'doi',
        'palavras_chave',
        'observacao',
    ];
}
