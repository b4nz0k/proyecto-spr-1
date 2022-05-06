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

Route::get('/alta-pagos', [App\Http\Controllers\PagosController::class, 'alta'])->name('Pagos.alta');
Route::post('/registro-pagos', [App\Http\Controllers\PagosController::class, 'store'])->name('Pagos.store');
Route::get('/lista-pagos', [App\Http\Controllers\PagosController::class, 'lista'])->name('Pagos.lista');
Route::get('/editar-pago/{id}', [App\Http\Controllers\PagosController::class, 'lista'])->name('Pagos.lista');

Route::get('/lista-contratos', [App\Http\Controllers\ContratosController::class, 'lista'])->name('Contratos.lista');
Route::post('/registro-contratos', [App\Http\Controllers\ContratosController::class, 'store'])->name('Contratos.store');
Route::get('/alta-contratos', [App\Http\Controllers\ContratosController::class, 'alta'])->name('Contratos.alta');





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
