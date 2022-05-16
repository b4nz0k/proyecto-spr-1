<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estaciones;
use App\Models\Pagos;
use App\Models\Contratos;
use Carbon\Carbon;
use SebastianBergmann\Diff\Diff;

class EstacionesController extends Controller
{

    public function fechas($dateget, $dia_corte) {
        $carbon = new Carbon();
        $date_hoy = $carbon->now(); // 
        $fecha_corte = $carbon::create($date_hoy->year,$date_hoy->month, $dia_corte, null);
        $date_pago = $carbon::create($dateget);
        $diff_corte = $date_hoy->diffInDays($fecha_corte); // entre el dia de corte y hoy
        $diff_pago = $date_pago->diffInDays($fecha_corte); // Entre el dia del ultimo pago y el
        $mensaje = "null";
        if ($date_pago > $date_hoy) {                        $mensaje = "Esta mal la fecha"; } 
        else if ($date_hoy->format('Y-m-d') < $fecha_corte) {
                                                         $mensaje = "Vas al corriente"; 
                        if ($diff_corte < 10) { $mensaje = "Es proximo a vencer el pago"; } 
                        if ($diff_pago > 30) { $mensaje ="No vas al Corriente"; }
            }
        else { $mensaje ="Error con la fecha"; }
        return ($mensaje);
    }

    public function index()
    {
        $date2 = date('2022-05-30');
        $dia_corte = 30;
        $fecha = EstacionesController::fechas($date2 , $dia_corte );
        // $date = $date->format('d-m-Y');

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
        return $fecha;
        return view('pagina.estaciones.lista')
        ->with('estaciones', $estaciones)
        ->with('contratoss', $contratoss)
        ->with('pagoss', $pagoss);
    }


    public function store(Request $request)
    {
        //
    }

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
