<?php

use Illuminate\Support\Facades\Route;
use App\Models\Estado;
use App\Models\Produto;

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

Route::get('/ola', function() {
    return "Olá, mundo!";
});

Route::get('/estados/todos', function() {
    $estados = Estado::all();
    return view('lista', [ 'dados' => $estados ]);
});

Route::get('estados/{id}', function ($id) {
    $estado = Estado::findOrFail($id);

    if($estado == null) {
        return "ID inválido";
    }

    return view('lista', [ 'dados' => $estado ]);
});

Route::get('/produtos/todos', function() {
    $produtos = Produto::all();
    return view('lista', [ 'dados' => $produtos ]);
});

Route::get('produtos/{id}', function ($id) {
    $produto = Produto::findOrFail($id);
    return view('lista', [ 'dados' => $produto ]);
});
