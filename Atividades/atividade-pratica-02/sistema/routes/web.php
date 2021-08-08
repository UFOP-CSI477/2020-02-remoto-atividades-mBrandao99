<?php

use App\Http\Controllers\AdminEquipamentoController;
use App\Http\Controllers\AdminRegistroController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\EquipamentoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/main', function () {
    return view('main');
})->name('main');

Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware('auth');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('/users', AdminUserController::class)->middleware('auth');
    Route::resource('/equipamentos', AdminEquipamentoController::class)->middleware('auth');
    Route::resource('/registros', AdminRegistroController::class)->middleware('auth');
});

Route::resource('/equipamentos', EquipamentoController::class);
Route::resource('/registros', RegistroController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
