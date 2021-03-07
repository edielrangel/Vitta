<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function userLog($acao){
    $now = date("Y-m-d H:i:s");
    DB::table('logs')->insert(['user_id' => Auth::user()->id, 'acao' => $acao, 'created_at' => $now, 'updated_at' => $now]);
}

function autorToLivro($livro_id){
    
    $autores = DB::table('autor_livros')
                ->join('autors', 'autors.id', '=', 'autor_livros.autor_id')
                ->where('autor_livros.livro_id', '=', $livro_id)
                ->select('autors.id', 'autors.autor', 'autors.citacao', 'autor_livros.id')
                ->get();
    return $autores;
}

function livrosAutor($autor_id){
    $nLivros = DB::table('autor_livros')
            ->where('autor_id', '=', $autor_id)
            ->count('autor_id');
    return $nLivros;
}

function autorToArtigo($artigo_id){
    
    $autores = DB::table('autor_artigos')
                ->join('autors', 'autors.id', '=', 'autor_artigos.autor_id')
                ->where('autor_artigos.artigo_id', '=', $artigo_id)
                ->select('autors.id', 'autors.autor', 'autors.citacao', 'autor_artigos.id')
                ->get();
    return $autores;
}

function artigosAutor($autor_id){
    $nArtigos = DB::table('autor_artigos')
            ->where('autor_id', '=', $autor_id)
            ->count('autor_id');
    return $nArtigos;
}

function cdd($cdd){
    
}