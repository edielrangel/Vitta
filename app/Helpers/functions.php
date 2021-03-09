<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function userLog($acao, $tipo){
    $now = date("Y-m-d H:i:s");
    DB::table('logs')->insert(['user_id' => Auth::user()->id, 'acao' => $acao, 'tipo_acao' =>$tipo, 'created_at' => $now, 'updated_at' => $now]);
}

function livroCitacoes($id_livro){
    $nCitacoes = DB::table('citacao_livros')
        ->where('livro_id', '=', $id_livro)
        ->count('livro_id');
    return $nCitacoes;
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

function artigoCitacoes($id_artigo){
    $nCitacoes = DB::table('citacao_artigos')
        ->where('artigo_id', '=', $id_artigo)
        ->count('artigo_id');
    return $nCitacoes;
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