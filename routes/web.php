<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CidadeController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::redirect('/', '/admin/cidades', 301);

Route::prefix('admin')->name('admin.')->group(function(){

    Route::get('cidades', [CidadeController::class, 'cidades'])->name('cidades.listar');
    Route::get('cidades/adicionar', [CidadeController::class, 'formAdicionar'])->name('cidades.form');
    Route::post('cidades/salvar', [CidadeController::class, 'adicionar'])->name('cidades.adicionar');

});

