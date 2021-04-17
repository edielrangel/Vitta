<?php

namespace App\Http\Controllers\Inventario;

use App\Http\Controllers\Controller;
use App\Http\Requests\GravuraRequest;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GravuraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.inventario.gravura.index');
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
        $imagem_thumb_nome = 'thumb_'.uniqid(date('HisYmd')).'.'.$extensao;
        
        /** FIM TRATAMENTO IMAGEM */
            
        /** FAZER UPLOAD */
        $path = 'public/img/inventario/gravuras/';

        $upload = $request->file('imagem')->storeAs($path, $imagem_nome);
        $img = Image::make(public_path() . $path . $imagem_nome);
        $img->resize(100, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        dd(is_writable($path . $imagem_thumb_nome));
        $img->save(public_path().'/img/inventario/gravuras'.$imagem_thumb_nome);

        /** FIM UPLOAD */
        //$img = Image::make()
        dd($img);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
