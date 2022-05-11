<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estaciones;



class EstacionesController extends Controller
{

    public function index()
    {

            /* $estaciones = Estaciones::find(1)->ciudades;
            return ($estaciones)->nombre; */

        $estaciones = Estaciones::all();
        /* $array = array();
        foreach ($estaciones as $estacion) {
            $contratos = Contratos::find($estacion->foranea)->nombre;
            array_push($array, array(
                "id"=> $estacion->id,
                "contrato_id"}}=>$contrato->id;
            ))
            # code...
        } */
        return view('pagina.principal')->with('estaciones', $estaciones);

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
