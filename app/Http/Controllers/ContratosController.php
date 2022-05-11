<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratos;
use App\Models\Estaciones;
use App\Models\cat_proveedores;
class contratosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function alta()
    {        
        $estaciones = Estaciones::all();
        $proveedores = cat_proveedores::all('nombre','tipo');

        return view ('pagina.alta-contratos')
            ->with('proveedores', $proveedores)
            ->with('estaciones', $estaciones);
    }

    public function lista()
    {
        $contratos = Contratos::all();
        return view ('pagina.lista-contratos')->with('contratos', $contratos);
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

        $contratos->save();
        // return ("Prueba de POST");
        return redirect('lista-contratos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $contratos = Contratos::find($id);
        return view ('pagina.editar-contrato')->with('contratos', $contratos);
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
        $contratos->save();
        // return ("Prueba de POST");
        return redirect('lista-contratos');   
     }

    public function destroy($id)
    {
        $contrato = Contratos::find($id);
        $contrato->delete();
        return redirect('lista-contratos');    }
}
