<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CapturaController;

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

    //Rota de captura das informacoes no campo captura
    Route::get('/formulario-captura', function() {
        return view('?????');
    });

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //Rota da visualizacao do historico
Route::get('/historico', [CapturaController::class, 'historico'])->name('historico');
    //Rota de captura de informacoes
Route::post('/captura', [CapturaController::class, 'captura'])->name('captura');