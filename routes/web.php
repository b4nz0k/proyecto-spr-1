<?php

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
/* Route::get('/', function () {
    return view('welcome');
}); */



Route::get('/', function () {
    return view('pagina.principal');
});


Route::get('/alta_contratos', function () {
    return view('pagina.alta_contratos');
});


Route::get('/alta_pagos', function () {
    return view('pagina.alta_pagos');
});

Route::get('/lista_pagos', function () {
    return view('pagina.lista_pagos');
});


Route::get('/welcome', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('articulo', [App\Http\Controllers\ArticuloController::class, 'index'])->name('articulo.index');
//Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

Route::get('get-articulos/{codigo}',[App\Http\Controllers\ArticuloController::class, 'store'])->name('crear-articulo');
Route::resource('/lista_contratos', 'App\Http\Controllers\ContratosController');
Route::resource('/lista_pagos', 'App\Http\Controllers\PagosController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
