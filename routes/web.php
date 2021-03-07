<?php

use App\Http\Controllers\Biblioteca\ArtigoController;
use App\Http\Controllers\Biblioteca\AutorArtigoController;
use App\Http\Controllers\Biblioteca\AutorController;
use App\Http\Controllers\Biblioteca\AutorLivroController;
use App\Http\Controllers\Biblioteca\EditoraController;
use App\Http\Controllers\Biblioteca\LivroController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Geral\EntidadeController;
use App\Http\Controllers\Saude\PressaoArterialController;

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
    return view('welcome');
});

/* Route::get('/dashboards', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard-old'); */

require __DIR__.'/auth.php';

Route::post('/teste', function () {
    return view('dashboard.index');
})->name('teste');

Route::prefix('admin')->group(function(){
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
    
    Route::resources([
        'entidade' => EntidadeController::class,
        'saude/pressao' => PressaoArterialController::class,
        'biblioteca/editoras' => EditoraController::class,
        'biblioteca/autores' => AutorController::class,
        'biblioteca/livros' => LivroController::class,
        'biblioteca/autorLivro' => AutorLivroController::class,
        'biblioteca/artigos' => ArtigoController::class,
        'biblioteca/autorArtigo' => AutorArtigoController::class,
    ]);
    
});
