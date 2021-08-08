<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CompraController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('principal');
})->name('principal');

Route::resource('/estados', EstadoController::class);
Route::resource('/cidades', CidadeController::class);
Route::resource('/pessoas', PessoaController::class)->middleware('auth');
Route::resource('/produtos', ProdutoController::class);

Route::get('/compras/relpessoa', [CompraController::class, 'relPessoa'])->name('compras.relpessoa');
Route::get('/compras/relproduto', [CompraController::class, 'relProduto'])->name('compras.relproduto');
Route::get('/compras/reldata', [CompraController::class, 'relData'])->name('compras.reldata');
Route::resource('/compras', CompraController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
