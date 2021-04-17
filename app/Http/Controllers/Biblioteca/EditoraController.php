<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateEditoraRequest;
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class EditoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editora = Editora::paginate();
        return view('dashboard.biblioteca.editora.index', ['editoras' => $editora]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.biblioteca.editora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateEditoraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateEditoraRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['editora']);
        
        if (Editora::create($data)) {
            Alert::success('Ok', 'Editora Cadastrada com Sucesso!');
            userLog('Cadastrou a Editora '.$data['editora'], 'create');
            return redirect()->route('editoras.index');
        } else {
            Alert::warning('Error', 'Erro ao cadastrar a Editora. Tente novamente mais tarde!');
            return redirect()->route('editoras.index');
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
        return redirect()->route('editoras.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($editora = Editora::find($id)) {
            $livros = Livro::where('editora_id', $id)->paginate();
            return view('dashboard.biblioteca.editora.edit', [
                'editora' => $editora, 
                'livros' => $livros
                ]);
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados da Editora. Tente novamente mais tarde!');
            return redirect()->route('editoras.index');
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
        if ($editora = Editora::find($id)) {
            $data = $request->all();
            $data['slug'] = Str::slug($data['editora']);
            $editora->update($data);
            Alert::success('Ok', 'Editora Atualizada com Sucesso!');
            userLog('Atualizou os dados da Editora '.$data['editora'], 'update');
            return redirect()->route('editoras.index');
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados da Editora. Tente novamente mais tarde!');
            return redirect()->route('editoras.index');
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
        if ($editora = Editora::find($id)) {
            $editora->delete();
            Alert::success('Ok', 'Editora '.$editora->editora.' foi excluída com Sucesso!');
            userLog('Excluiu a Editora '.$editora->editora, 'delete');
            return redirect()->route('editoras.index');
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados da Editora. Tente novamente mais tarde!');
            return redirect()->route('editoras.index');
        }
    }
}
