<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Contratos;
use App\Models\Estaciones;
use App\Models\cat_proveedores;
use App\Models\cat_entidad;
use App\Models\cat_ciudad;
use PHPUnit\TextUI\XmlConfiguration\Constant;

class contratosController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    
    public function agregar_campo (Object $arreglo, $tabla , $objeto_nuevo, $select = "nombre", $wheree = "id", $wheree_end ='id') {
        foreach ($arreglo as $ar) {
            $item = DB::table($tabla)
            ->select($select)
            ->where($wheree, $ar->$wheree_end)
            ->value($select);

            $arreglo->find($ar->id)->$objeto_nuevo = $item;
        }
            return ($arreglo);
    }

    public function lista()
    {            

        $contratos = Contratos::all();
        $contratos = contratosController::agregar_campo($contratos, "cat_proveedores", "proveedor_nombre");
        $contratos = contratosController::agregar_campo($contratos, "estaciones", "ciudad_id", "ciudad", "id", 'id_estacion');
        $contratos = contratosController::agregar_campo($contratos, "estaciones", "entidad_id", "entidad", "id", 'id_estacion');
        $contratos = contratosController::agregar_campo($contratos, "cat_ciudad", "ciudad_nombre", "nombre", "id", 'ciudad_id');
        $contratos = contratosController::agregar_campo($contratos, "cat_entidad", "entidad_nombre", "nombre", "id", 'entidad_id');

        
        return view ('pagina.contratos.lista')
        ->with('contratos', $contratos);
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
