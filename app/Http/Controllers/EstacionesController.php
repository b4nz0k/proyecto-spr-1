<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Pagos;
use App\Models\Contratos;
use App\Models\cat_ciudad;
use App\Models\Estaciones;
use App\Models\cat_entidad;
use App\Models\cat_estatus;
use App\Models\Comentarios;
use Illuminate\Http\Request;
use App\Models\cat_proveedores;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ContratosController;

class EstacionesController extends Controller
{
    public static function actualizar() { // actualizar los estatus de los pagos

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

            return redirect('/principal');
        
            // echo "pago id = ". $pago->id . ", contrato ". $pago->contrato . ", num Corte del contrato = ". $dia_corte . ", Fecha ult Pago:". $pago->fecha_pago .', Estatus old: ' . $estatusold. ", Estatus: ". $estatusnew ."<br>" ;
        }
    }


    public function fechas($dateget, $dia_corte) {
        $carbon = new Carbon();
        $date_hoy = ($carbon->now()); // 
        $fecha_corte = $carbon::create($date_hoy->year,$date_hoy->month, $dia_corte);
        $fecha_pago = $carbon::create($dateget);
        $diff_corte = $fecha_corte->diffInDays($date_hoy); // entre el dia de corte y hoy
        $diff_pago = $fecha_pago->diffInDays($fecha_corte); // Entre el dia del ultimo pago y el
        $mensaje =null;

        if ($diff_pago < 31) { $mensaje = 1;
            if ($diff_corte > 0 && $diff_corte < 10 && $diff_pago > 20 ) { $mensaje =2;     }
        }
        else {$mensaje = 3;}
        return ($mensaje);
        // return ($mensaje .'<br>Hoy : '. $date_hoy  .'<br>Dia de corte: ' . $fecha_corte .'<br>Dif Corte: ' . $diff_corte .'<br> Dif Pago: '. $diff_pago);
    } 

    public function index()
    {
        // return EstacionesController::atualizar_fechas();
        $estaciones = Estaciones::all(); //sE TIENE QUE REVISAR PARA FUTUROS CAMBIOS
        $estaciones = ContratosController::agregar_campo($estaciones, "cat_ciudad", "ciudad_nombre", "nombre", "id", 'ciudad');
        $estaciones = ContratosController::agregar_campo($estaciones, "cat_entidad", "entidad_nombre", "nombre", "id", 'entidad');
        $estaciones = ContratosController::agregar_campo($estaciones, "cat_proveedores", "proveedor_id", "id", "id", 'proveedor');
        $estaciones = ContratosController::agregar_campo($estaciones, "cat_proveedores", "proveedor_nombre", "nombre", "id", 'proveedor');
        $estaciones = ContratosController::agregar_campo($estaciones, "contratos", "contrato_numero", "num_contrato", "id", 'proveedor_id');
        $estaciones = ContratosController::agregar_campo($estaciones, "contratos", "contrato_id", "id", "id", 'proveedor_id');
        $estaciones = ContratosController::agregar_campo($estaciones, "pagos", "pago_ultimo", "fecha_pago", "contrato", 'contrato_id');
        $estaciones = ContratosController::agregar_campo($estaciones, "pagos", "status", "status", "contrato", 'contrato_id');

        return view('pagina.estaciones.lista')
        ->with('estaciones', $estaciones);

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
        $estaciones->referencia = $request->referencia;

        $estaciones->save();
        if ($estaciones->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
    }
        // return redirect('lista-entidades');    }

    public function edit($id)
    {
                // Buscando las opciones disponibles para editar 
        $ciudades = cat_ciudad::all();
        $entidades = cat_entidad::all();
        $estatus = cat_estatus::all();
        $proveedores = cat_proveedores::all();

        $estacion = Estaciones::find($id); //Buscando los nombres relacionados  de la estacion
        
        //Mandando los datos al formulario
        return view ('pagina.estaciones.edit') 
        ->with('estacion', $estacion)
        ->with('ciudades', $ciudades)
        ->with('estatus', $estatus)
        ->with('entidades', $entidades)
        ->with('proveedores', $proveedores);
    }

    public function historial($id)
    {
        // $historial = Comentarios::select('id', 'comentario' ,'updated_at')->get();
        $estacionid = $id;
        $historial = DB::table('historial_estaciones')
                        ->select('id','estacion', 'comentario', 'proveedor', 'estatus', 'updated_at')
                        ->orderby('id')
                        ->where('estacion','=', $id)
                        ->get();

        return view('pagina.estaciones.historial')
        ->with('estacionid', $estacionid)
        ->with('historial', $historial);
    }

    public function update(Request $request, $id)
    {
        $estacion = Estaciones::find($id); 
            //Agregar comentarios
            $comentario = new Comentarios();
            $comentario->estacion = $id;
            $comentario->comentario = $estacion->comentarios;
            $comentario->estatus = $estacion->estatus;
            $comentario->proveedor = $estacion->proveedor;
            $comentario->save();

        //Actualizar los datos
        $estacion->ciudad = $request->ciudad;
        $estacion->entidad = $request->entidad;
        $estacion->grupo = $request->grupo;
        $estacion->latitud = $request->latitud;
        $estacion->longitud = $request->longitud;
        $estacion->proveedor = $request->proveedor;
        $estacion->estatus = $request->estatus;
        $estacion->comentarios = $request->comentarios;
        $estacion->referencia = $request->referencia;

        if ($estacion->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();    
    }

    public function destroy($id)
    {
        $estacion = cat_estatus::find($id);
        if ($estacion->delete()) return back()->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
    }

}
