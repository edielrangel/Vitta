<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\GravuraRequest;
use App\Models\Gravura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class GravuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gravuras = Gravura::orderBy('artista')->paginate();
        return view('dashboard.inventario.gravura.index', ['gravuras' => $gravuras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.inventario.gravura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\GravuraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GravuraRequest $request)
    {
        $data = $request->all();
        /** TRATANDO DA IMAGEM */
        $extensao = $request->imagem->extension();
        $imagem_nome = uniqid(date('HisYmd')).'.'.$extensao;
        $imagem_thumb_nome = 'thumb_'.$imagem_nome;
        
        /** FIM TRATAMENTO IMAGEM */
            
        /** FAZER UPLOAD */
        $upload = $request->imagem->storeAs('img/inventario/gravuras/', $imagem_nome);
        //$img = Image::make($request->imagem)->fit(273, 270)->encode();
        /* $img->resize(null, 200, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        }); */
        //$test = Image::make($request->imagem)->save('img/inventario/gravuras/'.$imagem_thumb_nome);
        //$img->save(storage_path().'/public/img/inventario/gravuras/'.$imagem_thumb_nome);
        /** FIM UPLOAD */

        /** SALVAR NO BANCO DE DADOS */
        $data['imagem'] = $imagem_nome;
        $data['thumbnail'] = $imagem_thumb_nome;
        
        if (Gravura::create($data)) {
            userLog('Cadastrou nova Gravura do Artista '.$data['artista'], 'create');
            Alert::success('Ok', 'Gravura salva com sucesso!');
            return redirect()->route('gravuras.index');
        } else {
            Alert::error('Error', 'Erro ao tentar salvar Gravura. Tente novamente mais tarde!');
            return redirect()->route('gravuras.index');
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
        if ($gravura = Gravura::where('id', $id)->first()) {
            return view('dashboard.inventario.gravura.show', ['gravura' => $gravura]);
        } else {
            Alert::error('Error', 'Erro ao localizar Gravura. Tente novamente mais tarde!');
            return redirect()->route('gravuras.index');
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
        if ($gravura = Gravura::where('id', $id)->first()) {
            return view('dashboard.inventario.gravura.edit', ['gravura' => $gravura]);
        } else {
            Alert::error('Error', 'Erro ao localizar Gravura. Tente novamente mais tarde!');
            return redirect()->route('gravuras.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\GravuraRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GravuraRequest $request, $id)
    {
        $data = $request->all();

        if ($gravura = Gravura::where('id', $id)->first()) {
            
            
               
            if ($request->imagem) {
                $extensao = $request->imagem->extension();
                $imagem_nome = uniqid(date('HisYmd')).'.'.$extensao;
                $imagem_thumb_nome = 'thumb_'.$imagem_nome;
               /** FAZER UPLOAD */
                $upload = $request->imagem->storeAs('img/inventario/gravuras/', $imagem_nome);
                /** DELETANDO IMAGEM ANTERIOR */
                Storage::delete('img/inventario/gravuras/'.$gravura->imagem);

                /** SALVAR NO BANCO DE DADOS */
                $data['imagem'] = $imagem_nome;
                $data['thumbnail'] = $imagem_thumb_nome;
            }

            $gravura->update($data);
            userLog('Atualizou dados da Gravura '.$gravura->id, 'update');
            Alert::success('Ok', 'Dados da Gravura atualizados com Sucesso!');
            return redirect()->route('gravuras.show', $gravura->id);

        } else {
            Alert::error('Error', 'Erro ao localizar Gravura. Tente novamente mais tarde!');
            return redirect()->route('gravuras.index');
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
