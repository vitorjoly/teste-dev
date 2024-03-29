<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

//Rota da visualizacao do historico
Route::get('/historico', [App\Http\Controllers\CapturaController::class, 'historico'])->name('historico')->middleware('auth');

//Rota de captura de informacoes
Route::post('/captura', [App\Http\Controllers\CapturaController::class, 'captura'])->name('captura')->middleware('auth');

//Rota para deletar os artigos
Route::get('captura/deletar/{artigo}', [App\Http\Controllers\CapturaController::class, 'deletar'])->name('deletar')->middleware('auth');