<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\EstacionesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\cat_estatus;
use App\Http\Controllers\cat_ciudad;
use App\Http\Controllers\cat_entidad;


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




/* 
Route::get('/principal', function () {
    return view('pagina.principal');
}); */
Route::controller(EstacionesController::class)-> group(function() {
    Route::get('/principal', 'index')->name('Estaciones.index');
});


    //Rutas del CRUD Pagos
Route::controller(PagosController::class)->group(function() { 
    Route::get('lista-pagos', 'lista')->name('Pagos.lista'); // Vista de lista Pagos
    Route::post('registro-pagos', 'store')->name('Pagos.store'); // funcion POST registrar altas
    Route::get('alta-pagos', 'alta')->name('Pagos.alta'); // Vista de formulario altas
    Route::get('editar-pago/{id}', 'edit')->name('Pagos.edit'); // Vista de formulario editar-pago
    Route::post('editar-pago/{id}', 'update')->name('Pagos.update'); // funcion de editar-pago
    Route::get('eliminar-pago/{id}', 'destroy')->name('Pagos.destroy'); // funcion de editar-pago
});

 //Rutas del Crud Contratos
 Route::controller(ContratosController::class)->group(function() {
    Route::get('lista-contratos', 'lista')->name('Contratos.lista');    // Vista de lista
    Route::post('registro-contratos', 'store')->name('Contratos.store');   // funcion POST registrar
    Route::get('alta-contratos', 'alta')->name('Contratos.alta');       // Vista de formulario altas
    Route::get('editar-contrato/{id}', 'edit')->name('Contratos.edit'); // Vista de formulario editar-
    Route::post('editar-contrato/{id}', 'update')->name('Contratos.update'); // funcion de editar-
    Route::get('eliminar-contrato/{id}', 'destroy')->name('Contratos.destroy'); // funcion de editar-
});

  //Rutas del Crud Proveedores
Route::controller(ProveedoresController::class)->group(function() {
    Route::get('lista-proveedores', 'lista')->name('Proveedores.lista');    // Vista de lista
    Route::post('registro-proveedores', 'store')->name('Proveedores.store');    // funcion POST registrar
    Route::get('alta-proveedores', 'alta')->name('Proveedores.alta');       // Vista de formulario altas
    Route::get('editar-proveedor/{id}', 'edit')->name('Proveedores.edit'); // Vista de formulario editar-
    Route::post('editar-proveedor/{id}', 'update')->name('Proveedores.update'); // funcion de editar
    Route::get('eliminar-proveedor/{id}', 'destroy')->name('Proveedores.destroy'); // funcion de editar-pago
  });


  //Rutas del crud Estatus
Route::controller(cat_estatus::class)->group(function() {
    Route::get('lista-etatus', 'lista')->name('cat_estatus.lista');    // Vista de lista
    Route::post('registro-estatus', 'store')->name('cat_estatus.store');   // funcion POST registrar
    Route::get('alta-estatus', 'alta')->name('cat_estatus.alta');       // Vista de formulario altas
    Route::get('editar-estatus/{id}', 'edit')->name('cat_estatus.edit'); // Vista de formulario editar-
    Route::post('editar-estatus/{id}', 'update')->name('cat_estatus.update'); // funcion de editar-
    Route::get('eliminar-estatus/{id}', 'destroy')->name('cat_estatus.destroy'); // funcion de editar-
});
  //Rutas del crud Ciudades
  Route::controller(cat_ciudad::class)->group(function() {
    Route::get('lista-ciudades', 'lista')->name('cat_ciudad.lista');    // Vista de lista
    Route::post('registro-ciudad', 'store')->name('cat_ciudad.store');   // funcion POST registrar
    Route::get('alta-ciudad', 'alta')->name('cat_ciudad.alta');       // Vista de formulario altas
    Route::get('editar-ciudad/{id}', 'edit')->name('cat_ciudad.edit'); // Vista de formulario editar-
    Route::post('editar-ciudad/{id}', 'update')->name('cat_ciudad.update'); // funcion de editar-
    Route::get('eliminar-ciudad/{id}', 'destroy')->name('cat_ciudad.destroy'); // funcion de editar-
});
  //Rutas del crud Entidades
  Route::controller(cat_entidad::class)->group(function() {
    Route::get('lista-entidades', 'lista')->name('cat_entidad.lista');    // Vista de lista
    Route::post('registro-entidad', 'store')->name('cat_entidad.store');   // funcion POST registrar
    Route::get('alta-entidad', 'alta')->name('cat_entidad.alta');       // Vista de formulario altas
    Route::get('editar-entidad/{id}', 'edit')->name('cat_entidad.edit'); // Vista de formulario editar-
    Route::post('editar-entidad/{id}', 'update')->name('cat_entidad.update'); // funcion de editar-
    Route::get('eliminar-entidad/{id}', 'destroy')->name('cat_entidad.destroy'); // funcion de editar-
});

  Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])
  ->group(function () {
      Route::get('/dashboard', function () {
          return view('dashboard');
      })->name('dashboard');
  });

Route::get('/welcome', function () {
    return view('welcome');
});




// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
