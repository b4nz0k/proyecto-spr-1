<?php

namespace App\Http\Controllers;
use App\Models\cat_proveedores;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ProveedoresController extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }

    public function lista()
    {
        $proveedores = cat_proveedores::all('id', 'nombre', 'razon_social', 'tipo'); 
        return view ('pagina.proveedores.lista')
        ->with('proveedores', $proveedores);
    }

    public function alta()
    {
        return view('pagina.proveedores.alta');
    }

    public function store(request $request)
    {   //Guardar datos
        $proveedore = new cat_proveedores();
        $proveedore->nombre = $request->nombre;
        $proveedore->razon_social = $request->razon_social;
        $proveedore->tipo = $request->tipo;
        if ($proveedore->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
    }

    public function edit($id)
    {
        $proveedores = cat_proveedores::find($id);
        return view('pagina.proveedores.edit')
        ->with('proveedores', $proveedores);
    }

    public function update(Request $request, $id)
    {
        $proveedores = cat_proveedores::find($id);
        $proveedores->nombre = $request->nombre;
        $proveedores->razon_social = $request->razon_social;
        $proveedores->tipo = $request->tipo;
        if ($proveedores->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();

    }

    public function destroy($id)
    {
        $proveedor = cat_proveedores::find($id);
        if ($proveedor->delete()) return back()->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
  
    }
}