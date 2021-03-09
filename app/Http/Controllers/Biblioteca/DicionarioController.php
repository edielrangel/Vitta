<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateDicionarioRequest;
use App\Models\Dicionario;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DicionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termos = Dicionario::paginate(20);
        return view('dashboard.biblioteca.dicionario.index', ['termos' => $termos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.biblioteca.dicionario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateDicionarioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateDicionarioRequest $request)
    {
        $data = $request->all();
        $data['termo'] = strtoupper($data['termo']);
        if (Dicionario::create($data)) {
            Alert::success('Ok', 'Termo adicionado com sucesso.');
            userLog('Adicionado o Termo: '.$data['termo'], 'create');
            return redirect()->route('dicionario.index');
        } else {
            Alert::error('Error', 'Não foi possível cadastrar o novo termo. Tente novamente mais tarde.');
            return redirect()->route('dicionario.index');
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
        return redirect()->route('dicionario.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($termo = Dicionario::find($id)) {
            return view('dashboard.biblioteca.dicionario.edit', ['termo' => $termo]);
        } else {
            Alert::error('Error', 'Dados não localizado. Tente novamente mais tarde.');
            return redirect()->route('dicionario.index');
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
        if ($termo = Dicionario::find($id)) {
            $termo->update($data);
            Alert::success('Ok', 'Dados atualizados com Sucesso.');
            userLog('Atualizou dados do Termo '.$data['termo'], 'update');
            return redirect()->route('dicionario.edit', $termo->id);
        } else {
            Alert::error('Error', 'Dados não localizado. Tente novamente mais tarde.');
            return redirect()->route('dicionario.index');
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
        if ($termo = Dicionario::find($id)) {
            $termo->delete($id);
            Alert::success('Ok', 'Dados Exclídos com Sucesso.');
            userLog('Excluíu os dados do Termo '.$termo->termo, 'delete');
            return redirect()->route('dicionario.index');
        } else {
            Alert::error('Error', 'Dados não localizado. Tente novamente mais tarde.');
            return redirect()->route('dicionario.index');
        }
    }
}
