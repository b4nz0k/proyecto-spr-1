<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratos;

class contratosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function alta()
    {
        return view ('pagina.alta-contratos');
    }

    public function lista()
    {
        $contratos = Contratos::all();
        return view ('pagina.lista-contratos')->with('contratos', $contratos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contratos = Contratos::find($id);
        return view ('pagina.editar-contrato')->with('contratos', $contratos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contrato = Contratos::find($id);
        $contrato->delete();
        return redirect('lista-contratos');    }
}
