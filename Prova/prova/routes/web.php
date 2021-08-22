<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\VacinaController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'inicial'])->name('inicial');
Route::get('/home', [HomeController::class, 'inicial'])->name('home');

Route::get('/geral', [HomeController::class, 'geral'])->name('geral');
Route::get('/geral/vacinadas', [HomeController::class, 'vacinadas'])->name('vacinadas');
Route::get('/aplicacoes', [HomeController::class, 'aplicacoes'])->name('aplicacoes');

Route::get('/admin', [HomeController::class, 'admin'])->name('admin')->middleware('auth');

Route::resource('admin/pessoas', PessoaController::class)->middleware('auth');
Route::resource('admin/unidades', UnidadeController::class)->middleware('auth');
Route::resource('admin/vacinas', VacinaController::class)->middleware('auth');
Route::resource('admin/registros', RegistroController::class)->middleware('auth');
