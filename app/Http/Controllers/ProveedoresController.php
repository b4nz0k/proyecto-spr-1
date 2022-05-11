<?php

namespace App\Http\Controllers;
use App\Models\cat_proveedores;

use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }

    public function lista()
    {
        $proveedores = cat_proveedores::all();
        return view ('pagina.proveedores.lista')
        ->with('proveedores', $proveedores);

    }

    public function alta()
    {
        return view('pagina.proveedores.alta');
    }

    public function store(request $request)
    {
        $proveedore = new cat_proveedores();
        $proveedore->nombre = $request->nombre;
        $proveedore->razon_social = $request->razon_social;
        $proveedore->tipo = $request->tipo;
        // return ($proveedores);
        $proveedore->save();

        return redirect('lista-proveedores');
         
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
        $proveedores->save();
        return redirect('lista-proveedores');
    }

    public function destroy($id)
    {
        $proveedor = cat_proveedores::find($id);
        $proveedor->delete();
        return redirect('lista-proveedores');    
    }
}