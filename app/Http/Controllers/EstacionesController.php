<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estaciones;
use App\Models\Pagos;
use App\Models\Contratos;




class EstacionesController extends Controller
{

    public function index()
    {

            /* $estaciones = Estaciones::find(1)->ciudades;
            return ($estaciones)->nombre; */
        $estaciones = Estaciones::all();
        $pagoss = Pagos::all();
        $contratoss = Contratos::all();
        // return ($estaciones)->id;
         /* $array = array();
        foreach ($estaciones as $estacion) {
            $contratos = Contratos::find($estacion->foranea)->nombre;
            array_push($array, array(
                "id"=> $estacion->id,
                "contrato_id"}}=>$contrato->id;
            ))
            # code...
        } */

        return view('pagina.principal')
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
