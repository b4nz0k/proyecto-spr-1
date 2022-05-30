<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Pagos;
use App\Models\Contratos;
use App\Models\Estaciones;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\cat_proveedores;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PagosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function alta()
    {

        $contratos = Contratos::all();
        $proveedores = cat_proveedores::all();

        return view('pagina.pagos.alta')
            ->with('proveedores', $proveedores)
            ->with('contratos', $contratos);
    }

    public function lista()
    {
        $pagos = Pagos::paginate(10);
        foreach ($pagos as $pago) {
            $contrato = (Contratos::find($pago->contrato)->num_contrato);
            $pagos->find($pago->id)->contrato_nombre = $contrato;
        }
        return view('pagina.pagos.lista')
            ->with('pagos', $pagos);
    }

    public function verpdf($id)
    {
        $pagos = Pagos::find($id);
        $pdf = Storage::disk('public')->get('../'.$pagos->archivo);
        $response = new Response($pdf, 200);
        $response->header('Content-Type', 'application/pdf');

        return $pdf;

    }

    public function store(Request $request)
    {   // Validacion que todos los campos esten seleccionados
/*         $this->validate($request, [
            'fecha_solicitud' => 'required',
            'fecha_pago' => 'required',
            'periodo_pago' => 'required',
            'num_recibo_factura' => 'required',
            'contrato' => 'required',
            'monto' => 'required',
            'archivo' => 'required',
        ],
        // Segundo array de validacion Mensajes personalizados
        [
            'fecha_solicitud' => 'Se requiere el campo de Fecha de Solicitud',
            'fecha_pago' => 'Se requiere el campo de Fecha de Pago',
            'periodo_pago' => 'Se requiere el campo de Periodo de Pago',
            'num_recibo_factura' => 'Se requiere el campo Numero de Factura',
            'contrato' => 'Se requiere el campo de Contrato',
            'monto' => 'Se requiere el campo de Monto',
            'archivo' => 'Se requiere archivo adjunto',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        } */
        // The validation passed
        $pagos = new Pagos();
        $pagos->fecha_solicitud = $request->fecha_solicitud;
        $pagos->fecha_pago = $request->fecha_pago;
        $pagos->periodo_pago = $request->periodo_pago;
        $pagos->num_recibo_factura = $request->num_recibo_factura;
        $pagos->contrato = $request->contrato;
        $pagos->monto = $request->monto;
        $msj = "Los datos se guardado correctamente!";
        $path = $request->file('archivo')->storeAs(
            'public',
            $request->file('archivo')->hashName()
        );
        $pagos->archivo = $path;

        // return ('Archivo : <a href="'. PagosController::descargar($path) . '">Archivo_pdf</a>');


        if ($pagos->save()) return redirect("/lista-pagos")->with('msj', $msj);
        else return back();

    }

    public function edit($id)
    {
        $pagos = Pagos::find($id);
        return view('pagina.pagos.edit')
            ->with('pagos', $pagos);
        
    }

    public function update(Request $request, $id)
    {
        $pago = Pagos::find($id);
        $path = $request->file('archivo')->storeAs(
            'public/',
            $request->id . '.pdf'
        );

        $pago->fecha_solicitud = $request->fecha_solicitud;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->periodo_pago = $request->periodo_pago;
        $pago->num_recibo_factura = $request->num_recibo_factura;
        $pago->contrato = $request->contrato;
        $pago->monto = $request->monto;
        $pago->archivo = $request->id . '.pdf';
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
    public function pagar($id)
    {
        // Buscando las opciones disponibles para Pagar 
        $contratos = Contratos::all();
        $pagoss = Pagos::all();
        $estacion = Estaciones::find($id);
        $pago_id = null;
        $contrato = ($contratos)->where('id_estacion', '==', $estacion->id)->first();
        $contrato = isset($contrato->id) ? ($contrato->id) : 'Sin Contrato';
        if ($pago = ($pagoss)->where('contrato', '==', ($contrato))->first()) {
            $pago_id = $pago->id;
        }

        $proveedores = cat_proveedores::all();
        return view('pagina.pagos.pago')
            ->with('proveedores', $proveedores)
            ->with('contratos', $contratos)
            ->with('contrato_id', $contrato)
            ->with('pago', $pago_id);
    }
    public function subirArchivo(Request $request)
    {
    }
}
