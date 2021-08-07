<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\PessoaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CompraController;
use App\Models\Estado;
use App\Models\Produto;
use Illuminate\Routing\Route as RoutingRoute;

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
    return view('principal');
})->name('principal');

Route::resource('/estados', EstadoController::class);
Route::resource('/cidades', CidadeController::class);
Route::resource('/pessoas', PessoaController::class);
Route::resource('/produtos', ProdutoController::class);

Route::get('/compras/relpessoa', [CompraController::class, 'relPessoa'])->name('compras.relpessoa');
Route::get('/compras/relproduto', [CompraController::class, 'relProduto'])->name('compras.relproduto');
Route::get('/compras/reldata', [CompraController::class, 'relData'])->name('compras.reldata');
Route::resource('/compras', CompraController::class);



// Route::get('/compras/relpessoa', function () {
//     return "teste";
// });


// Route::get('/ola', function() {
//     return "Olá, mundo!";
// });

// Route::get('/estados/todos', function() {
//     $estados = Estado::all();
//     return view('lista', [ 'dados' => $estados ]);
// });

// Route::get('estados/{id}', function ($id) {
//     $estado = Estado::findOrFail($id);

//     if($estado == null) {
//         return "ID inválido";
//     }

//     return view('lista', [ 'dados' => $estado ]);
// });

// Route::get('/produtos/todos', function() {
//     $produtos = Produto::all();
//     return view('lista', [ 'dados' => $produtos ]);
// });

// Route::get('produtos/{id}', function ($id) {
//     $produto = Produto::findOrFail($id);
//     return view('lista', [ 'dados' => $produto ]);
// });
