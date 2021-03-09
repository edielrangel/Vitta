<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Models\Artigo;
use App\Models\CitacaoArtigo;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitacoesController extends Controller
{
    public function index(){
        return view('dashboard.biblioteca.citacoes.index');
    }

    /** ARTIGOS */
    public function addCitacaoArtigo($id){
        
        $artigo = Artigo::find($id);
        return view('dashboard.biblioteca.citacoes.artigos.create', ['artigo' => $artigo]);
    }
    
    public function showCitacoesArtigo($id){
        $citacao = DB::table('citacao_artigos')
                    ->join('artigos', 'artigos.id', '=', 'citacao_artigos.artigo_id')
                    ->where('citacao_artigos.id', '=', $id)
                    ->select('citacao_artigos.*', 'artigos.titulo')
                    ->first();
        return view('dashboard.biblioteca.citacoes.artigos.citacaoShow', ['citacao' => $citacao]);
    }

    /** LIVROS */
    public function addCitacaoLivro($id){
        
        $livro = Livro::find($id);
        return view('dashboard.biblioteca.citacoes.livros.create', ['livro' => $livro]);
    }

    public function showCitacoesLivro($id){
        $citacao = DB::table('citacao_livros')
                    ->join('livros', 'livros.id', '=', 'citacao_livros.livro_id')
                    ->where('citacao_livros.id', '=', $id)
                    ->select('citacao_livros.*', 'livros.titulo')
                    ->first();
        return view('dashboard.biblioteca.citacoes.livros.citacaoShow', ['citacao' => $citacao]);
    }
}
