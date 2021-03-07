<?php

namespace App\Http\Controllers\Biblioteca;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateLivroRequest;
use App\Models\AutorLivro;
use App\Models\Editora;
use App\Models\Livro;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class LivroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /* $url = 'https://www.googleapis.com/books/v1/volumes?q=isbn:9786557170229';
        $response = file_get_contents($url);
        $newsData = json_decode($response);
        $dados = response()->json($newsData)->items[0]->volumeInfo->title; */

        $livros = Livro::paginate();
        return view('dashboard.biblioteca.livros.index', ['livros' => $livros]);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editoras = Editora::orderBy('editora', 'asc')->get();
        return view('dashboard.biblioteca.livros.create', ['editoras' => $editoras]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateLivroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateLivroRequest $request)
    {
        $data = $request->all();
        $data['tipo_autor'] = '1';
        if ($livro = Livro::create($data)) {
            Alert::success('Ok', 'O Livro '.$data['titulo'].' foi cadastrado com sucesso. Agora vincule o(s) autores(as).');
            userLog('Cadastrou o Livro '.$data['titulo']);
            return redirect()->route('autorlivro.show', $livro->id);
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao tentar cadastrar o Livro. Tente novamente mais tarde.');
            return redirect()->route('livros.index');
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
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($livro = Livro::find($id)) {
            $editoras = Editora::orderBy('editora', 'asc')->get();
            $autorLivros = AutorLivro::where('livro_id', '=', $livro->id)->get();
            return view('dashboard.biblioteca.livros.edit', ['editoras' => $editoras, 'livro' => $livro, 'autorLivros' => $autorLivros]);
            
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao carregar dados do Livro. Tente novamente mais tarde.');
            return redirect()->route('livros.index');
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
        if ($livro = Livro::find($id)) {
            $livro->update($data);
            Alert::success('Ok', 'Os dados do Livro '.$livro->titulo.' foram atualizados com sucesso.');
            userLog('Atualizou os dados do Livro: '.$livro->titulo);
            return redirect()->route('livros.index');
        } else {
            Alert::warning('Error', 'Ocorreu um erro ao carregar dados do Livro. Tente novamente mais tarde.');
            return redirect()->route('livros.index');
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
