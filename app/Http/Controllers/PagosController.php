<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Pagos;
use App\Models\cat_proveedores;
use App\Models\Contratos;
use App\Models\Estaciones;

class PagosController extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }

    public function alta()
    {

        $contratos = Contratos::all();
        $proveedores = cat_proveedores::all();

        return view ('pagina.pagos.alta')
        ->with('proveedores', $proveedores)
        ->with('contratos', $contratos);

    }
    
    public function lista()
    {
         $pagos = Pagos::all();
        foreach ($pagos as $pago) {
           $contrato = (Contratos::find($pago->contrato)->num_contrato);
           $pagos->find($pago->id)->contrato_nombre = $contrato;
        }
        return view ('pagina.pagos.lista')
        ->with('pagos', $pagos);
    }

    public function descargar($id) {
        $pagos = Pagos::find($id);
        return (Storage::download($pagos->archivo));
    }

    public function store(Request $request)
    {

        $path = $request->file('archivo')->store(
            'public/'.$request->user()->id);
            
            // return ('Archivo : <a href="'. PagosController::descargar($path) . '">Archivo_pdf</a>');
            
        $pagos = new Pagos();
        $pagos->fecha_solicitud = $request->fecha_solicitud;
        $pagos->fecha_pago = $request->fecha_pago;
        $pagos->periodo_pago = $request->periodo_pago;
        $pagos->num_recibo_factura = $request->num_recibo_factura;
        $pagos->contrato = $request->contrato;
        $pagos->monto = $request->monto;
        $pagos->archivo = $path;
        $msj = "Los datos se guardado correctamente!";
        if ($pagos->save()) return redirect("/lista-pagos")->with('msj', $msj );
        else return back();

        // $pagos->save();
        // return ("Prueba de POST");
        // return redirect('lista-pagos');
    }

    public function edit($id)
    {
        $pagos = Pagos::find($id);
        return view ('pagina.pagos.edit')
        ->with('pagos', $pagos);
    }

    public function update(Request $request, $id)
    {
          $pago = Pagos::find($id);

                $path = $request->file('archivo')->store(
                'public/'.$request->user()->id . $id);

        $pago->fecha_solicitud = $request->fecha_solicitud;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->periodo_pago = $request->periodo_pago;
        $pago->num_recibo_factura = $request->num_recibo_factura;
        $pago->contrato = $request->contrato;
        $pago->monto = $request->monto;
        $pago->archivo = $path;
        if ($pago->save()) return redirect("/lista-pagos")->with('msj', "Los datos se guardado correctamente!");
        else return back();
        // $pago->save();
        // $pagos->monto = $request->monto;
        // return redirect('lista-pagos');
    }

    public function destroy($id)
    {
        $pago = Pagos::find($id);
        if ($pago->delete()) return redirect("/lista-pagos")->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
        // $pago->delete();
        // return redirect('lista-pagos');
    }
    public function pagar($id) {
        // Buscando las opciones disponibles para Pagar 
        $contratos = Contratos::all();
        $pagoss = Pagos::all();
        $estacion = Estaciones::find($id);
        $pago_id = null;
        $contrato = ($contratos)->where('id_estacion', '==',$estacion->id)->first();
        $contrato = isset($contrato->id) ? ($contrato->id) : 'Sin Contrato' ;
        if ($pago =($pagoss)->where('contrato','==',  ($contrato))->first())
        { $pago_id = $pago->id; }

        $proveedores = cat_proveedores::all();
        return view ('pagina.pagos.pago')
        ->with('proveedores', $proveedores)
        ->with('contratos', $contratos)
        ->with('contrato_id', $contrato)
        ->with('pago', $pago_id);
    }
    public function subirArchivo(Request $request) {

    }
}
