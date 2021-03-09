<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateArtigoRequest;
use App\Models\Artigo;
use App\Models\AutorArtigo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artigos = Artigo::paginate();
        return view('dashboard.biblioteca.artigos.index', ['artigos' => $artigos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.biblioteca.artigos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateArtigoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateArtigoRequest $request)
    {
        $data = $request->all();
        if ($artigo = Artigo::create($data)) {
            Alert::success('Ok', 'O Artigo '.$data['titulo'].' foi cadastrado com sucesso. Agora vincule o(s) autores(as).');
            userLog('Cadastrou o Artigo '.$data['titulo'], 'create');
            return redirect()->route('autorArtigo.show', $artigo->id);
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao tentar cadastrar o Artigo. Tente novamente mais tarde.');
            return redirect()->route('artigos.index');
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
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($artigo = Artigo::find($id)) {
            $autorArtigo = AutorArtigo::where('artigo_id', '=', $artigo->id)->get();
            return view('dashboard.biblioteca.artigos.edit', ['artigo' => $artigo, 'autorArtigo' => $autorArtigo]);
            
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao carregar dados do Artigo. Tente novamente mais tarde.');
            return redirect()->route('artigos.index');
        }
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
        $data = $request->all();
        if ($artigo = Artigo::find($id)) {
            $artigo->update($data);
            userLog('Atualizou os dados do Artigo: '.$data['titulo'], 'update');
            Alert::success('Ok', 'Dados do Artigo atualizados com sucesso!');
            return redirect()->route('artigos.edit', $id);
        } else {
            Alert::error('Error', 'Não foi possível atualizar dados. Tente novamente mais tarde.');
            return redirect()->back();
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alert::info('Atenção', 'Esta ação ainda não está disponível.');
        return redirect()->back();
    }
}
