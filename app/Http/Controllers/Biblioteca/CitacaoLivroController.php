<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCitacaoLivroRequest;
use App\Models\CitacaoLivro;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CitacaoLivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citacaoLivros = DB::table('citacao_livros')
                        ->join('livros', 'livros.id', '=', 'citacao_livros.livro_id')
                        ->groupBy('citacao_livros.livro_id')
                        ->paginate();
        return view('dashboard.biblioteca.citacoes.livros.index', ['citacaoLivros' => $citacaoLivros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $livros = Livro::orderBy('titulo', 'asc')->get();
        return view('dashboard.biblioteca.citacoes.livros.create', ['livros' => $livros]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCitacaoLivroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCitacaoLivroRequest $request)
    {
        $data = $request->all();
        $tags = explode(',', $data['tags']);
        
        /*
        Salvar as tags, se a mesma já estiver no Banco, não será salva
        */
        $now = date("Y-m-d H:i:s");
        //dd($data);
        foreach ($tags as $tag){
            $tag = strtolower($tag);
            if(!DB::table('tags')->where('tag', '=', $tag)->first()){
                DB::table('tags')->insert(['tag' => $tag, 'created_at' => $now, 'updated_at' => $now]);
            }
        }

        if (CitacaoLivro::create($data)) {
            Alert::success('Ok', 'Citação salva com sucesso');   
            userLog('Adicionou citação ao Livro '.$data['livro_id'], 'create');
            $livro = Livro::where('id', '=', $data['artigo_id'])->first();
            return view('dashboard.biblioteca.citacoes.livros.create', ['livro' => $livro]);
        } else {
            Alert::warning('Error', 'Erro ao Salvar citação. tente mais tarde');
            redirect()->route('CitacaoLivro.index');
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
        $citacaoLivro = CitacaoLivro::where('livro_id', '=', $id)->paginate(5);
        $livro = DB::table('livros')
                ->join('citacao_livros', 'citacao_livros.livro_id', '=', 'livros.id')
                ->where('livros.id', '=', $id)
                ->select('livros.*')
                ->first();
        return view('dashboard.biblioteca.citacoes.livros.show', ['citacaoLivro' => $citacaoLivro, 'livro' => $livro]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($citacao = CitacaoLivro::find($id)) {
            $livro = DB::table('livros')
                ->join('citacao_livros', 'citacao_livros.livro_id', '=', 'livros.id')
                ->first();
                return view('dashboard.biblioteca.citacoes.livros.edit', ['citacao' => $citacao, 'livro' => $livro]);
        } else {
            Alert::error('Error', 'Erro ao tentar carregar dados do Livro. Tente novamete mais tarde.');
            return redirect()->back();
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
        if ($citacao = CitacaoLivro::find($id)) {
            $citacao->update($data);
            Alert::success('Ok', 'Citação atualizada com Sucesso');
            userLog('Atualizou a citação: '.$id.' do livro'.$citacao->livro_id, 'update');
            return redirect()->route('citacoesLivro.show', $id);
        } else {
            Alert::error('Error', 'Erro ao tentar atualizar Citação. Tente novamete mais tarde.');
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
        if ($citacao = CitacaoLivro::find($id)) {
            $citacao->delete($id);
            Alert::success('Ok', 'Citação excluída com Sucesso');
            userLog('Excluiu uma citação '.$citacao->id.' do Livro '.$citacao->livro_id, 'delete');
            return redirect()->route('citacaoLivro.show', $citacao->livro_id);
        } else {
            Alert::error('Atenção', 'Esta ação ainda não está disponível!');
            return redirect()->back();
        }
    }
}
