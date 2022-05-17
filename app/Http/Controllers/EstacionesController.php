<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estaciones;
use App\Models\Pagos;
use App\Models\cat_ciudad;
use App\Models\cat_entidad;
use App\Models\cat_estatus;
use App\Models\cat_proveedores;
use App\Models\Contratos;
use Carbon\Carbon;
use SebastianBergmann\Diff\Diff;

class EstacionesController extends Controller
{
    


    public function fechas($dateget, $dia_corte) {
        $carbon = new Carbon();
        $date_hoy = $carbon->now(); // 
        $fecha_corte = $carbon::create($date_hoy->year,$date_hoy->month, $dia_corte, null);
        $fecha_pago = $carbon::create($dateget);
        $diff_corte = $date_hoy->diffInDays($fecha_corte); // entre el dia de corte y hoy
        $diff_pago = $fecha_pago->diffInDays($fecha_corte); // Entre el dia del ultimo pago y el
        $mensaje =null;

        if ($fecha_corte->format('Y-m-d') > $fecha_pago->format('Y-m-d')) {
            $mensaje = 1;
            if ($diff_corte < 10 ) { $mensaje = 2; }    
            if ($diff_pago > 30) { $mensaje =3; }


        
/*         if ($fecha_pago->format('Y-m-d') < $date_hoy->format('Y-m-d')) {  $mensaje = 1;
                    if ($date_hoy->format('Y-m-d') > $fecha_corte->format('Y-m-d')) { $mensaje = 1;
                        if ($diff_corte < 10 ) { $mensaje = 2; }                  } 
                    if ($diff_pago > 25) { $mensaje =3; }
              
            }
        else {$mensaje = 4;} */
        } else {$mensaje = 4;}
        return ($mensaje);
    } 

    public function index()
    {
        // return EstacionesController::atualizar_fechas();
        $estaciones = Estaciones::all();
        $pagoss = Pagos::all();
        $contratoss = Contratos::all();
        // return ($estaciones)->id;
/*          $array = array();
        foreach ($estaciones as $estacion) {
            $contratos = Contratos::find($estacion->foranea)->nombre;
            array_push($array, array(
                "id"=> $estacion->id,
                "contrato_id"=>$contratos->id
            ));
            # code...
        } */
        // return $fecha;
        return view('pagina.estaciones.lista')
        ->with('estaciones', $estaciones)
        ->with('contratoss', $contratoss)
        ->with('pagoss', $pagoss);
    }
    public static function atualizar_fechas() { // actualizar los estatus de los pagos
        $contratos = Contratos::all();
        $pagoss = Pagos::all('id', 'status', 'contrato', 'fecha_pago');
        foreach ($pagoss as $pago) {   //Cada una de los datos de la tabla en la columna status
            //obtener el numero de corte 
            $dia_corte = ($contratos->find($pago->contrato))->dia_corte_mensual;
            $estatusold = $pago->status; //status antiguo
            //devolvemos el estatus
            $estatusnew = EstacionesController::fechas($pago->fecha_pago , $dia_corte );
            $pago->status = $estatusnew;
            $pago->save();
            // echo "pago id = ". $pago->id . ", contrato ". $pago->contrato . ", num Corte del contrato = ". $dia_corte . ", Fecha ult Pago:". $pago->fecha_pago . ", Estatus: ". $estatusnew ."<br>" ;
        }
    }
    public function alta () {

        $estaciones = Estaciones::all();
        $contratos = Contratos::all();   
        $ciudades = cat_ciudad::all();
        $entidades = cat_entidad::all();
        $estatus = cat_estatus::all();
        $proveedores = cat_proveedores::all();


            return view('pagina.estaciones.alta')
                ->with('estaciones', $estaciones)
                ->with('contratos', $contratos)
                ->with('ciudades', $ciudades)
                ->with('entidades', $entidades)
                ->with('estatus', $estatus)
                ->with('proveedores', $proveedores);
    }

    public function store(Request $request)
    {
        $estaciones = new Estaciones();
        $estaciones->ciudad = $request->ciudad;
        $estaciones->entidad = $request->entidad;
        $estaciones->grupo = $request->grupo;
        $estaciones->latitud = $request->latitud;
        $estaciones->longitud = $request->longitud;
        $estaciones->proveedor = $request->proveedor;
        $estaciones->estatus = $request->estatus;
        $estaciones->comentarios = $request->comentarios;

        return ($estaciones);
        // $estaciones->save();
/*         if ($estaciones->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back(); */
    }
        // return redirect('lista-entidades');    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
