<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateAutorRequest;
use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::paginate();
        return view('dashboard.biblioteca.autores.index', ['autores' => $autores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.biblioteca.autores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateAutorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateAutorRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($data['autor']);

        /* Converte o nome para os padrões da ABNT*/
        $nomeCompleto = explode(' ', $data['autor']);
        $primeiro = strtoupper(array_pop($nomeCompleto));
        $outros = implode(" ", $nomeCompleto);
        $data['citacao'] = $primeiro.', '.$outros;

        if (Autor::create($data)) {
            Alert::success('Ok', 'Autor(a) Cadastrada(a) com Sucesso!');
            userLog('Cadastrou o/a Autor(a)  '.$data['autor']);
            return redirect()->route('autores.index');
        } else {
            Alert::warning('Error', 'Erro ao cadastrar o/a Autor(a). Tente novamente mais tarde!');
            return redirect()->route('autores.index');
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
        return redirect()->route('autores.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($autor = Autor::find($id)) {
            return view('dashboard.biblioteca.autores.edit', ['autor' => $autor]);
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados da autor. Tente novamente mais tarde!');
            return redirect()->route('autores.index');
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
        if ($autor = Autor::find($id)) {
            $data = $request->all();
            $data['slug'] = Str::slug($data['autor']);
            
            /* Converte o nome para os padrões da ABNT*/
            $nomeCompleto = explode(' ', $data['autor']);
            $primeiro = strtoupper(array_pop($nomeCompleto));
            $outros = implode(" ", $nomeCompleto);
            $data['citacao'] = $primeiro.', '.$outros;

            $autor->update($data);
            Alert::success('Ok', 'Autor(a) Atualizado(a) com Sucesso!');
            userLog('Atualizou os dados do(a) Autor(a) '.$data['autor']);
            return redirect()->route('autores.index');
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados do(a) Autor(a). Tente novamente mais tarde!');
            return redirect()->route('autores.index');
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
        if ($autor = Autor::find($id)) {
            $autor->delete();
            userLog('Excluiu o/a Autor(a) '.$autor->autor);
            Alert::success('Ok', 'Autor(a) '.$autor->autor.' foi excluído(a) com Sucesso!');
            return redirect()->route('autores.index');
        } else {
            Alert::warning('Error', 'Erro ao carregar os dados da autor. Tente novamente mais tarde!');
            return redirect()->route('autores.index');
        }
    }
}
