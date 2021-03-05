<?php

namespace App\Http\Controllers\Saude;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdatePressaoArterialRequest;
use App\Models\PressaoArterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PressaoArterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pressao = DB::table('pressao_arterials')->paginate();
        return view('dashboard.saude.pressao.index', ['pressaos' => $pressao]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.saude.pressao.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdatePressaoArterialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdatePressaoArterialRequest $request)
    {
        $data = $request->all();
        if ($pressao = PressaoArterial::create($data)) {
            Alert::success('Ok', 'Dados Gravados com Sucesso');
            userLog('Dados sobre aferição de pressão arterial foram gravados com sucesso.');
            return redirect()->route('pressao.index');
        } else {
            Alert::warning('Error', 'Erro ao gravar dados. Tente novamente mais tarde.');
            return redirect()->route('pressao.index');
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
        
        if ($pressao = PressaoArterial::find($id)) {
            return view('dashboard.saude.pressao.edit', ['pressao' => $pressao]);
        } else {
            Alert::warning('Error', 'Dados não encontrados. Tente novamente mais tarde.');
            return redirect()->route('pressao.index');
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
        if ($pressao = PressaoArterial::find($id)) {
            $data = $request->all();
            $pressao->update($data);
            Alert::success('Ok', 'Dados Gravados com Sucesso');
            userLog('Dados sobre aferição de pressão arterial foram Atualizados com sucesso.');
            return redirect()->route('pressao.index');
        } else {
            Alert::warning('Error', 'Dados não encontrados. Tente novamente mais tarde.');
            return redirect()->route('pressao.index');
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
        if ($pressao = PressaoArterial::find($id)) {
            $pressao->delete();
            Alert::success('Ok', 'Dados Excluídos com Sucesso');
            userLog('Dados sobre aferição de pressão arterial foram Deletados com sucesso.');
            return redirect()->route('pressao.index');
        } else {
            Alert::warning('Error', 'Dados não encontrados. Tente novamente mais tarde.');
            return redirect()->route('pressao.index');
        }
    }
}
