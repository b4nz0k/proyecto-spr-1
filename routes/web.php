<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\ContratosController;
use App\Http\Controllers\EstacionesController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\EstatusController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\EntidadController;


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
    //Rutas CRUD estaciones
Route::controller(EstacionesController::class)-> group(function() {
    Route::get('/principal', 'index')->name('Estaciones.index');
    Route::post('registro-estacion', 'store')->name('Estaciones.store'); // funcion POST registrar altas
    Route::get('alta-estacion', 'alta')->name('Estaciones.alta'); // Vista de formulario altas
    Route::get('editar-estacion/{id}', 'edit')->name('Estaciones.edit'); // Vista de formulario editar-pago
    Route::post('editar-estacion/{id}', 'update')->name('Estaciones.update'); // funcion de editar-pago
    Route::get('eliminar-estacion/{id}', 'destroy')->name('Estaciones.destroy'); // funcion de editar-pago
    Route::get('historial-estacion/{id}', 'historial')->name('Estaciones.historial'); // Vemos el historial de la
    Route::get('/actualizar', 'actualizar')->name('Estaciones.actualizar'); // Vemos el historial de la
    Route::get('/lista-estaciones/{id}', 'estatus')->name('Estaciones.estatus'); // Vamos a ver las estaciones al corriente, atradsadas y al corriente
    
});


    //Rutas del CRUD Pagos
Route::controller(PagosController::class)->group(function() { 
    Route::get('lista-pagos', 'lista')->name('Pagos.lista'); // Vista de lista Pagos
    Route::post('registro-pagos', 'store')->name('Pagos.store'); // funcion POST registrar altas
    Route::get('alta-pagos', 'alta')->name('Pagos.alta'); // Vista de formulario altas
    Route::get('editar-pago/{id}', 'edit')->name('Pagos.edit'); // Vista de formulario editar-pago
    Route::post('editar-pago/{id}', 'update')->name('Pagos.update'); // funcion de editar-pago
    Route::get('eliminar-pago/{id}', 'destroy')->name('Pagos.destroy'); // funcion de editar-pago
    Route::get('pagar-estacion/{id}', 'pagar')->name('Pagos.pagar'); // Pagando la estacion en directo
    Route::get('visualizar-pago/{id}', 'verpdf')->name('Pagos.verpdf'); // Ruta para descargar archibos

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
Route::controller(EstatusController::class)->group(function() {
    Route::get('lista-estatus', 'lista')->name('Estatus.lista');    // Vista de lista
    Route::post('registro-estatus', 'store')->name('Estatus.store');   // funcion POST registrar
    Route::get('alta-estatus', 'alta')->name('Estatus.alta');       // Vista de formulario altas
    Route::get('editar-estatus/{id}', 'edit')->name('Estatus.edit'); // Vista de formulario editar-
    Route::post('editar-estatus/{id}', 'update')->name('Estatus.update'); // funcion de editar-
    Route::get('eliminar-estatus/{id}', 'destroy')->name('Estatus.destroy'); // funcion de editar-
});
  //Rutas del crud Ciudades
  Route::controller(CiudadController::class)->group(function() {
    Route::get('lista-ciudades', 'lista')->name('Ciudad.lista');    // Vista de lista
    Route::post('registro-ciudad', 'store')->name('Ciudad.store');   // funcion POST registrar
    Route::get('alta-ciudad', 'alta')->name('Ciudad.alta');       // Vista de formulario altas
    Route::get('editar-ciudad/{id}', 'edit')->name('Ciudad.edit'); // Vista de formulario editar-
    Route::post('editar-ciudad/{id}', 'update')->name('Ciudad.update'); // funcion de editar-
    Route::get('eliminar-ciudad/{id}', 'destroy')->name('Ciudad.destroy'); // funcion de editar-
});
  //Rutas del crud Entidades
  Route::controller(EntidadController::class)->group(function() {
    Route::get('lista-entidades', 'lista')->name('Entidad.lista');    // Vista de lista
    Route::post('registro-entidad', 'store')->name('Entidad.store');   // funcion POST registrar
    Route::get('alta-entidad', 'alta')->name('Entidad.alta');       // Vista de formulario altas
    Route::get('editar-entidad/{id}', 'edit')->name('Entidad.edit'); // Vista de formulario editar-
    Route::post('editar-entidad/{id}', 'update')->name('Entidad.update'); // funcion de editar-
    Route::get('eliminar-entidad/{id}', 'destroy')->name('Entidad.destroy'); // funcion de editar-
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
