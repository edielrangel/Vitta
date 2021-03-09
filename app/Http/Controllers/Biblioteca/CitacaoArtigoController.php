<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCitacaoArtigoRequest;
use App\Models\Artigo;
use App\Models\CitacaoArtigo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CitacaoArtigoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citacaoArtigos = DB::table('citacao_artigos')
                        ->join('artigos', 'artigos.id', '=', 'citacao_artigos.artigo_id')
                        ->groupBy('citacao_artigos.artigo_id')
                        ->paginate();
        return view('dashboard.biblioteca.citacoes.artigos.index', ['citacaoArtigos' => $citacaoArtigos]);
    }

    /**
     * Show the form for creating a new resource..
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $artigos = Artigo::orderBy('titulo', 'asc')->get();
        return view('dashboard.biblioteca.citacoes.artigos.create', ['artigos' => $artigos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateCitacaoArtigoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateCitacaoArtigoRequest $request)
    {
        $data = $request->all();
        $tags = explode(',', $data['tags']);
        
        /*
        Salvar as tags, se a mesma já estiver no Banco, não será salva
        */
        $now = date("Y-m-d H:i:s");
        foreach ($tags as $tag){
            $tag = strtolower($tag);
            if(!DB::table('tags')->where('tag', '=', $tag)->first()){
                DB::table('tags')->insert(['tag' => $tag, 'created_at' => $now, 'updated_at' => $now]);
            }
        }

        if (CitacaoArtigo::create($data)) {
            Alert::success('Ok', 'Citação salva com sucesso');   
            userLog('Adicionou citação ao Artigo '.$data['artigo_id'], 'create');
            $artigo = Artigo::find($data['artigo_id'])->first();
            return view('dashboard.biblioteca.citacoes.artigos.create', ['artigo' => $artigo]);
        } else {
            Alert::warning('Error', 'Erro ao Salvar citação. tente mais tarde');
            redirect()->route('citacaoArtigo.index');
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
        $citacaoArtigo = CitacaoArtigo::where('artigo_id', '=', $id)->paginate(5);
        $artigo = DB::table('artigos')
                ->join('citacao_artigos', 'citacao_artigos.artigo_id', '=', 'artigos.id')
                ->select('artigos.*')
                ->first();
        return view('dashboard.biblioteca.citacoes.artigos.show', ['citacaoArtigo' => $citacaoArtigo, 'artigo' => $artigo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($citacao = CitacaoArtigo::find($id)) {
            $artigo = DB::table('artigos')
                ->join('citacao_artigos', 'citacao_artigos.artigo_id', '=', 'artigos.id')
                ->first();
                return view('dashboard.biblioteca.citacoes.artigos.edit', ['citacao' => $citacao, 'artigo' => $artigo]);
        } else {
            Alert::error('Error', 'Erro ao tentar carregar dados do artigo. Tente novamete mais tarde.');
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
        if ($citacao = CitacaoArtigo::find($id)) {
            $citacao->update($data);
            Alert::success('Ok', 'Citação atualizada com Sucesso');
            userLog('Atualizou a citação: '.$id, 'update');
            return redirect()->route('citacoesArtigo.show', $id);
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
        if ($citacao = CitacaoArtigo::find($id)) {
            $citacao->delete($id);
            Alert::success('Ok', 'Citação excluída com Sucesso');
            userLog('Excluiu uma citação '.$citacao->id.' do Artigo '.$citacao->artigo_id, 'delete');
            return redirect()->route('citacaoArtigo.show', $citacao->artigo_id);
        } else {
            Alert::error('Atenção', 'Esta ação ainda não está disponível!');
            return redirect()->back();
        }
        
    }
}
