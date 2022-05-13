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
/*         $proveedores_array = array();
        foreach ($proveedores as $proveedor) {
                array_push($proveedores_array,([
                    'id' =>  ($proveedor->id),
                    'nombre' =>  ($proveedor->nombre),
                    'razon_social' =>  ($proveedor->razon_social),
                    'tipo' =>  ($proveedor->tipo)
             ]));
                    
        }   
        $proveedores_array2 = array();
                foreach ( $proveedores as $ordenp) {
                    array_push($proveedores_array2, $ordenp->nombre );
                }
         $nombres = Arr::sort ($proveedores_array2);
         return dd($nombres); */
        // return dd($proveedores_array);

        
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
        if ($proveedore->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
        // $proveedore->save();

        // return redirect('lista-proveedores');
         
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
        // $proveedores->save();
        // return redirect('lista-proveedores');
    }

    public function destroy($id)
    {
        $proveedor = cat_proveedores::find($id);
        if ($proveedor->delete()) return back()->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
        // $proveedor->delete();
        // return redirect('lista-proveedores');    
    }
}