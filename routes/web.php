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
    return view('auth.login');
 });
 Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
 ->group(function () {
     Route::get('/dashboard', function () {
         return view('dashboard');
     })->name('dashboard');
 });



Route::get('/principal', function () {
    return view('pagina.principal');
});

Route::get('/alta-pagos', [App\Http\Controllers\PagosController::class, 'alta'])->name('alta-pagos.alta');

Route::post('/registro-pagos', [App\Http\Controllers\PagosController::class, 'store'])->name('registro-pagos.store');

Route::get('/lista-pagos', [App\Http\Controllers\PagosController::class, 'lista'])->name('lista-pagos.lista');


Route::get('/lista-contratos', [App\Http\Controllers\ContratosController::class, 'lista'])->name('lista-contratos.lista');

Route::get('/alta-contratos', [App\Http\Controllers\ContratosController::class, 'alta'])->name('alta-contratos.alta');





Route::get('/welcome', function () {
    return view('welcome');
});




Route::get('articulo', [App\Http\Controllers\ArticuloController::class, 'index'])->name('articulo.index');
Route::post('articulo', [App\Http\Controllers\ArticuloController::class, 'store'])->name('articulo.store');
Route::get('articulos/create', [App\Http\Controllers\ArticuloController::class, 'create'])->name('articulo.create');
//Route::resource('articulos', 'App\Http\Controllers\ArticuloController');

Route::get('get-articulos/{codigo}',[App\Http\Controllers\ArticuloController::class, 'store'])->name('crear-articulo');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
