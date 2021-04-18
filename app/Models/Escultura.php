<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escultura extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'artista',
        'material',
        'estado',
        'altura',
        'largura',
        'profundidade',
        'peso', 
        'ano_aquisicao',
        'valor', 
        'imagem',
        'thumbnail',
        'observacao',
    ];
}
