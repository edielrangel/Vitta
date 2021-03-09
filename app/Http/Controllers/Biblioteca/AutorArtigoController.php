<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Models\Artigo;
use App\Models\Autor;
use App\Models\AutorArtigo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AutorArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('artigos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('artigos.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();

        if (!AutorArtigo::where('autor_id', '=', $dados['autor_id'])
                        ->where('artigo_id', '=', $dados['artigo_id'])->first()) {
            
            if (AutorArtigo::create($dados)) {
                userLog('Adicionou autor a Artigo '.$dados['artigo_id'], 'create');
                Alert::success('Ok', 'Autor adicionado comsucesso!');
                return redirect()->route('artigos.edit', $dados['artigo_id']);
            } else {
                Alert::warning('Error', 'Erro ao carregar os dados do Artigo. Tente novamente mais tarde!');
                return redirect()->route('artigos.index');
            }

        } else {
            Alert::warning('Error', 'Este autor já está cadastrado para esse Artigo');
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
        if ($artigo = Artigo::find($id)) {
            $autors = Autor::orderBy('autor', 'asc')->get();
            return view('dashboard.biblioteca.artigos.addAutor', ['artigo' => $artigo, 'autors' => $autors]);
            
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao carregar dados do Artigo. Tente novamente mais tarde.');
            return redirect()->route('artigos.index');
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
        return redirect()->route('artigos.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return redirect()->route('artigos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($autorArtigo = AutorArtigo::find($id)) {
            $autorArtigo->delete();
            Alert::success('Ok', 'Removido com Sucesso!');
            userLog('Removeu Autor de Artigo '.$autorArtigo->artigo_id, 'delete');
            return redirect()->route('artigos.edit', $autorArtigo['artigo_id']);
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados do Artigo. Tente novamente mais tarde!');
            return redirect()->route('artigos.index');
        }
    }
}
