<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAutorLivroRequest;
use App\Models\Autor;
use App\Models\AutorLivro;
use App\Models\Livro;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AutorLivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateAutorLivroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateAutorLivroRequest $request)
    {
        $dados = $request->all();

        if (!AutorLivro::where('autor_id', '=', $dados['autor_id'])
                        ->where('livro_id', '=', $dados['livro_id'])->first()) {
            
            if (AutorLivro::create($dados)) {
                userLog('Adicionou autor a Livro');
                Alert::success('Ok', 'Autor adicionado comsucesso!');
                return redirect()->route('livros.edit', $dados['livro_id']);
            } else {
                Alert::warning('Error', 'Erro ao carregar os dados do Livro. Tente novamente mais tarde!');
                return redirect()->route('livros.index');
            }

        } else {
            Alert::warning('Error', 'Este autor já está cadastrado para esse livro');
                return redirect()->back();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if ($livro = Livro::find($id)) {
            $autors = Autor::orderBy('autor', 'asc')->get();
            return view('dashboard.biblioteca.livros.addAutor', ['livro' => $livro, 'autors' => $autors]);
            
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao carregar dados do Livro. Tente novamente mais tarde.');
            return redirect()->route('livros.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateAutorLivroRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateAutorLivroRequest $request, $id)
    {
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($autorLivro = AutorLivro::find($id)) {
            $autorLivro->delete();
            Alert::success('Ok', 'Removido com Sucesso!');
            userLog('Removeu Autor de Livro');
            return redirect()->route('livros.edit', $autorLivro['livro_id']);
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados do Livro. Tente novamente mais tarde!');
            return redirect()->route('livros.index');
        }
        
    }
}
