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


Route::get('/alta_pagos', [App\Http\Controllers\PagosController::class, 'alta'])->name('alta_pagos.alta');

Route::post('/registro_pagos', [App\Http\Controllers\PagosController::class, 'create'])->name('registro_pagos.create');

Route::get('/lista_pagos', [App\Http\Controllers\PagosController::class, 'lista'])->name('lista_pagos.lista');




Route::get('/lista_contratos', [App\Http\Controllers\ContratosController::class, 'lista'])->name('lista_contratos.lista');

Route::get('/alta_contratos', [App\Http\Controllers\ContratosController::class, 'alta'])->name('alta_contratos.alta');





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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
