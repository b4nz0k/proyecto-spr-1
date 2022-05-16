<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Contratos;
use App\Models\Estaciones;
use App\Models\cat_proveedores;
use App\Models\cat_entidad;
use App\Models\cat_ciudad;
class contratosController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function alta()
    {        
        $estaciones = Estaciones::all();
        $proveedores = cat_proveedores::all('id', 'nombre','tipo');
                $ciudades_ordenado = array();        
                foreach ($estaciones as $estacion) {
                    array_push($ciudades_ordenado, 
                        ['nombre' => ($estacion->ciudades)->nombre],
                        ['id' => $estacion->id]
                ); }
        // return Arr::sort($ciudades_ordenado);

        return view ('pagina.contratos.alta')
            ->with('proveedores', $proveedores)
            ->with('estaciones', $estaciones);
    }

    public function lista()
    {
        $estaciones = Estaciones::all('id', 'grupo', 'ciudad', 'entidad');
                
        $ciudades = cat_ciudad::all('id', 'nombre');
        $entidades = cat_entidad::all('id', 'nombre');
        $contratos = Contratos::all();

        return view ('pagina.contratos.lista')
        ->with('estaciones', $estaciones)
        ->with('ciudades', $ciudades)
        ->with('entidades', $entidades )
        ->with('contratos', $contratos);
    }

    public function store(Request $request)
    {
        $contratos = new Contratos();

        $contratos->proveedor = $request->proveedor;
        $contratos->fecha_inicio = $request->fecha_inicio;
        $contratos->num_contrato = $request->num_contrato;
        $contratos->dia_corte_mensual = $request->dia_corte_mensual;
        $contratos->id_estacion = $request->id_estacion;
        $contratos->importe_mensual = $request->importe_mensual;
        // return ($contratos);

        if ($contratos->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
                // return redirect('lista-contratos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $estaciones = Estaciones::all();
        $proveedores = cat_proveedores::all('id', 'nombre','tipo');
        $contratos = Contratos::find($id);
        return view ('pagina.contratos.edit')
        ->with('proveedores', $proveedores)
        ->with('estaciones', $estaciones)
        ->with('contratos', $contratos);
    }

    public function update(Request $request, $id)
    {
        $contratos = Contratos::find($id);

        $contratos->proveedor = $request->proveedor;
        $contratos->fecha_inicio = $request->fecha_inicio;
        $contratos->num_contrato = $request->num_contrato;
        $contratos->dia_corte_mensual = $request->dia_corte_mensual;
        $contratos->id_estacion = $request->id_estacion;
        $contratos->importe_mensual = $request->importe_mensual;
        
        if ($contratos->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
        
        // return ("Prueba de POST");
        // return redirect('lista-contratos');   
     }

    public function destroy($id)
    {
        $contrato = Contratos::find($id);
        // $contrato->delete();
        if ($contrato->delete()) return back()->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
    }
}
