<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuadroRequest;
use App\Models\Quadro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class QuadroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quadros = Quadro::orderBy('artista')->paginate();
        return view('dashboard.inventario.quadro.index', ['quadros' => $quadros]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.inventario.quadro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\QuadroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuadroRequest $request)
    {
        $data = $request->all();
        /** TRATANDO DA IMAGEM */
        $extensao = $request->imagem->extension();
        $imagem_nome = uniqid(date('HisYmd')).'.'.$extensao;
        $imagem_thumb_nome = 'thumb_'.$imagem_nome;
        
        /** FIM TRATAMENTO IMAGEM */
            
        /** FAZER UPLOAD */
        $upload = $request->imagem->storeAs('img/inventario/quadros/', $imagem_nome);
        
        /** SALVAR NO BANCO DE DADOS */
        $data['imagem'] = $imagem_nome;
        $data['thumbnail'] = $imagem_thumb_nome;
        
        if (Quadro::create($data)) {
            userLog('Cadastrou novo Quadro do Artista '.$data['artista'], 'create');
            Alert::success('Ok', 'Quadro salva com sucesso!');
            return redirect()->route('quadros.index');
        } else {
            Alert::error('Error', 'Erro ao tentar salvar esculturas. Tente novamente mais tarde!');
            return redirect()->route('quadros.index');
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
        if ($quadro = Quadro::where('id', $id)->first()) {
            return view('dashboard.inventario.quadro.show', ['quadro' => $quadro]);
        } else {
            Alert::error('Error', 'Erro ao localizar Qaudro. Tente novamente mais tarde!');
            return redirect()->route('qaudros.index');
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
        if ($quadro = Quadro::where('id', $id)->first()) {
            return view('dashboard.inventario.quadro.edit', ['quadro' => $quadro]);
        } else {
            Alert::error('Error', 'Erro ao localizar Quadro. Tente novamente mais tarde!');
            return redirect()->route('quadros.index');
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
        //dd($data);
        if ($quadro = Quadro::where('id', $id)->first()) {
             
            if ($request->imagem) {
                $extensao = $request->imagem->extension();
                $imagem_nome = uniqid(date('HisYmd')).'.'.$extensao;
                $imagem_thumb_nome = 'thumb_'.$imagem_nome;
               /** FAZER UPLOAD */
                $upload = $request->imagem->storeAs('img/inventario/quadros/', $imagem_nome);
                /** DELETANDO IMAGEM ANTERIOR */
                Storage::delete('img/inventario/quadros/'.$quadro->imagem);

                /** SALVAR NO BANCO DE DADOS */
                $data['imagem'] = $imagem_nome;
                $data['thumbnail'] = $imagem_thumb_nome;
            }

            $quadro->update($data);
            userLog('Atualizou dados do Quadro '.$quadro->id, 'update');
            Alert::success('Ok', 'Dados da Quadro atualizados com Sucesso!');
            return redirect()->route('quadros.show', $quadro->id);

        } else {
            Alert::error('Error', 'Erro ao localizar Quadro. Tente novamente mais tarde!');
            return redirect()->route('quadros.index');
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
        //
    }
}
