<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\ChampionController;

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

Route::get('/index', [DefaultController::class, 'index']);

Route::get('/campeoes', [DraftController::class, 'buscaCampeoes']);

Route::get('/draft', [DraftController::class, 'index']);

Route::post('/ingame', [DraftController::class, 'calculaResultado'])->name('calcula.resultado');

Route::get('/resultado', [DraftController::class, 'resultadoPartida'])->name('exibe.resultado');

Route::get('/champion/{campeao?}', [ChampionController::class, 'index'])->name('campeao');
