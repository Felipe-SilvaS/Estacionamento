<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrecoController;
use App\Http\Controllers\{VagaController, EstadiaController};

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
Route::get('/', [EstadiaController::class, 'index']);

Route::resource('precos', PrecoController::class);
Route::resource('estadia', EstadiaController::class);
Route::resource('vagas', VagaController::class);
