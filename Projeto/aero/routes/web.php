<?php

use App\Http\Controllers\AeroportoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PassagemController;
use App\Http\Controllers\RelatorioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VooController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/', [HomeController::class, 'search'])->name('home.search');
Route::get('/detalhes/{voo}', [HomeController::class, 'showVoo'])->name('home.show');


Route::get('/perfil', [PassagemController::class, 'index'])->name('profile.index')->middleware('auth');

Route::get('/cidades', [CidadeController::class, 'list']);
Route::get('/cidades/{estado}', [CidadeController::class, 'list']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('empresas', EmpresaController::class)->middleware('admin');;
Route::resource('aeroportos', AeroportoController::class);
Route::resource('voos', VooController::class);
Route::resource('passagems', PassagemController::class)->middleware('auth');

Route::get('/relatorio', [RelatorioController::class, 'passagemVoo'])->name('relatoriopv');

Route::get('/users/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/update', [UserController::class, 'update'])->name('users.update')->middleware('auth');



