<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\EsculturaResquest;
use App\Models\Escultura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class EsculturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $esculturas = Escultura::orderBy('artista')->paginate();
        return view('dashboard.inventario.escultura.index', ['esculturas' => $esculturas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.inventario.escultura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        /** TRATANDO DA IMAGEM */
        $extensao = $request->imagem->extension();
        $imagem_nome = uniqid(date('HisYmd')).'.'.$extensao;
        $imagem_thumb_nome = 'thumb_'.$imagem_nome;
        
        /** FIM TRATAMENTO IMAGEM */
            
        /** FAZER UPLOAD */
        $upload = $request->imagem->storeAs('img/inventario/esculturas/', $imagem_nome);
        
        /** SALVAR NO BANCO DE DADOS */
        $data['imagem'] = $imagem_nome;
        $data['thumbnail'] = $imagem_thumb_nome;
        
        if (Escultura::create($data)) {
            userLog('Cadastrou nova Esculturas do Artista '.$data['artista'], 'create');
            Alert::success('Ok', 'Esculturas salva com sucesso!');
            return redirect()->route('esculturas.index');
        } else {
            Alert::error('Error', 'Erro ao tentar salvar esculturas. Tente novamente mais tarde!');
            return redirect()->route('esculturas.index');
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
        if ($escultura = Escultura::where('id', $id)->first()) {
            return view('dashboard.inventario.escultura.show', ['escultura' => $escultura]);
        } else {
            Alert::error('Error', 'Erro ao localizar Escultura. Tente novamente mais tarde!');
            return redirect()->route('esculturas.index');
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
        if ($escultura = Escultura::where('id', $id)->first()) {
            return view('dashboard.inventario.escultura.edit', ['escultura' => $escultura]);
        } else {
            Alert::error('Error', 'Erro ao localizar Escultura. Tente novamente mais tarde!');
            return redirect()->route('esculturas.index');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EsculturaResquest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EsculturaResquest $request, $id)
    {
        $data = $request->all();
        //dd($data);
        if ($escultura = Escultura::where('id', $id)->first()) {
             
            if ($request->imagem) {
                $extensao = $request->imagem->extension();
                $imagem_nome = uniqid(date('HisYmd')).'.'.$extensao;
                $imagem_thumb_nome = 'thumb_'.$imagem_nome;
               /** FAZER UPLOAD */
                $upload = $request->imagem->storeAs('img/inventario/esculturas/', $imagem_nome);
                /** DELETANDO IMAGEM ANTERIOR */
                Storage::delete('img/inventario/esculturas/'.$escultura->imagem);

                /** SALVAR NO BANCO DE DADOS */
                $data['imagem'] = $imagem_nome;
                $data['thumbnail'] = $imagem_thumb_nome;
            }

            $escultura->update($data);
            userLog('Atualizou dados da Escultura '.$escultura->id, 'update');
            Alert::success('Ok', 'Dados da Escultura atualizados com Sucesso!');
            return redirect()->route('esculturas.show', $escultura->id);

        } else {
            Alert::error('Error', 'Erro ao localizar Escultura. Tente novamente mais tarde!');
            return redirect()->route('esculturas.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escultura  $escultura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escultura $escultura)
    {
        //
    }
}
