<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Geral\EntidadeController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard-old');

require __DIR__.'/auth.php';

Route::get('/teste', function () {
    return view('dashboard.index');
});

Route::post('/teste', function () {
    return view('dashboard.index');
})->name('teste');

Route::prefix('admin')->group(function(){
    Route::resources([
        'entidade' => EntidadeController::class
    ]);
});
