<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateResenhaRequest;
use App\Models\Livro;
use App\Models\Resenha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ResenhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resenhas = DB::table('resenhas')
                    ->join('livros', 'livros.id', '=', 'resenhas.livro_id')
                    ->paginate();
        return view('dashboard.biblioteca.resenhas.index', ['resenhas' => $resenhas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livros = Livro::get();
        return view('dashboard.biblioteca.resenhas.create', ['livros' => $livros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateResenhaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateResenhaRequest $request)
    {
        $data = $request->all();
        if (Resenha::create($data)) {
            Alert::success('Ok', 'Resenha cadastrada com Sucesso');
            userLog('Cadastrou a Resenha do Livro '.$data['livro_id'], 'create');
            return redirect()->route('resenhas.index');
        } else {
            Alert::error('Error', 'Erro ao cadastrar resenha. Tente novamente mais tarde.');
            return redirect()->route('resenhas.index');
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
        if ($resenha = Resenha::find($id)) {
            $livro = Livro::find($resenha->livro_id)->first();
            $resenha['titulo'] = $livro->titulo;
            return view('dashboard.biblioteca.resenhas.show', ['resenha' => $resenha]);
        } else {
            Alert::error('Error', 'Erro ao Carregar dados. Tente novamente mais tarde.');
            return redirect()->route('resenhas.index');
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
        if ($resenha = Resenha::find($id)->first()) {
            $livro = Livro::find($resenha->livro_id)->first();
            $resenha['titulo'] = $livro->titulo;
            //dd($resenha);
            return view('dashboard.biblioteca.resenhas.edit', ['resenha' => $resenha]);
        } else {
            Alert::error('Error', 'Erro ao Carregar dados. Tente novamente mais tarde.');
            return redirect()->route('resenhas.index');
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
        if ($resenha = Resenha::find($id)) {
            $resenha->update($data);
            Alert::success('Ok', 'Dados da Resenha atualizados com sucesso!');
            userLog('Atualizados dados da Resenha do Livro '.$data['livro'], 'update');
            return redirect()->route('resenhas.edit', $id);
        } else {
            Alert::error('Error', 'Erro ao Carregar dados. Tente novamente mais tarde.');
            return redirect()->route('resenhas.index');
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
        Alert::info('Atenção', 'Essa ação ainda não está disponível');
        return redirect()->route('resenhas.index');
    }
}
