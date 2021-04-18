<?php

use App\Http\Controllers\Biblioteca\{
    ArtigoController, AutorArtigoController, AutorController,
    AutorLivroController, BibliotecaController, CitacaoArtigoController,
    CitacaoLivroController, CitacoesController, DicionarioController,
    EditoraController, LivroController, ResenhaController
};

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Geral\EntidadeController;
use App\Http\Controllers\Inventario\{
    InventarioController, EsculturaController,
    GravuraController, QuadroController,
};
use App\Http\Controllers\Saude\{
    PressaoArterialController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

/* Route::get('/dashboards', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard-old'); */

require __DIR__.'/auth.php';

Route::post('/teste', function () {
    return view('dashboard.index');
})->name('teste');

Route::prefix('admin')->middleware(['auth'])->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    
    Route::resource('entidade', EntidadeController::class);

    /** REFERENTE A SAÚDE */
    Route::resources([
        'saude/pressao' => PressaoArterialController::class,
    ]);
    /** FIM SAÚDE */
    
    /** REFERENTE A BIBLIOTECA */
    Route::resources([
        'bibliotecas' => BibliotecaController::class,
        'biblioteca/editoras' => EditoraController::class,
        'biblioteca/autores' => AutorController::class,
        'biblioteca/livros' => LivroController::class,
        'biblioteca/autorLivro' => AutorLivroController::class,
        'biblioteca/artigos' => ArtigoController::class,
        'biblioteca/autorArtigo' => AutorArtigoController::class,
        'biblioteca/citacaoArtigo' => CitacaoArtigoController::class,
        'biblioteca/citacaoLivro' => CitacaoLivroController::class,
        'biblioteca/dicionario' => DicionarioController::class,
        'biblioteca/resenhas' => ResenhaController::class,
    ]);
    //CITAÇÕES DE ARTIGOS
    Route::get('biblioteca/citacoes', [CitacoesController::class, 'index'])->name('citacoes.index');
    Route::get('biblioteca/citacoes/artigo/{id}', [CitacoesController::class, 'showCitacoesArtigo'])->name('citacoesArtigo.show');
    Route::get('biblioteca/citacoes/artigo/adicionar/{id}', [CitacoesController::class, 'addCitacaoArtigo'])->name('citacoesArtigo.add');
    
    //CITAÇÕES DE LIVROS
    Route::get('biblioteca/citacoes/livro/{id}', [CitacoesController::class, 'showCitacoesLivro'])->name('citacoesLivro.show');
    Route::get('biblioteca/citacoes/livro/adicionar/{id}', [CitacoesController::class, 'addCitacaoLivro'])->name('citacoesLivro.add');
    /** FIM BIBLIOTECA */

    /** INÍCIO DE INVENTÁRO */
    Route::resources([
        'inventario/gravuras' => GravuraController::class,
        'inventario/esculturas' => EsculturaController::class,
        'inventario/quadros' => QuadroController::class,
    ]);
    Route::get('inventario/', [InventarioController::class, 'index'])->name('inventario.index');
    /** FIM INVENTÁRO */
    
});
