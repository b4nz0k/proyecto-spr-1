<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\EstacionesController;
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
    return view('auth.login');

 });

 Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
 ->group(function () {
     Route::get('/dashboard', function () {
         return view('dashboard');
     })->name('dashboard');
 });


/* 
Route::get('/principal', function () {
    return view('pagina.principal');
}); */
Route::controller(EstacionesController::class)-> group(function() {
    Route::get('/principal', 'index')->name('Estaciones.index');
});



    //Rutas del CRUD Pagos
Route::controller(PagosController::class)->group(function() { 
    Route::get('/lista-pagos', 'lista')->name('Pagos.lista'); // Vista de lista Pagos
    Route::post('/registro-pagos', 'store')->name('Pagos.store'); // funcion POST registrar altas
    Route::get('/alta-pagos', 'alta')->name('Pagos.alta'); // Vista de formulario altas
    Route::get('/editar-pago/{id}', 'edit')->name('Pagos.edit'); // Vista de formulario etar-pago
    Route::post('editar-pago/{id}', 'update')->name('Pagos.update'); // funcion de editar-pago
    Route::get('eliminar-pago/{id}', 'destroy')->name('Pagos.destroy'); // funcion de editar-pago
});


Route::controller(ContratosController::class)->group(function() {
    Route::get('/lista-contratos', 'lista')->name('Contratos.lista');
    Route::post('/registro-contratos', 'store')->name('Contratos.store');
    Route::get('/alta-contratos', 'alta')->name('Contratos.alta');
    Route::get('/editar-contrato/{id}', 'edit')->name('Contratos.edit'); // Vista de formulario etar-pago
    Route::post('editar-contrato/{id}', 'update')->name('Contratos.update'); // funcion de editar-pago
    Route::get('eliminar-contrato/{id}', 'destroy')->name('Contratos.destroy'); // funcion de editar-pago

  });




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
