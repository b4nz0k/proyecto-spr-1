<?php

namespace App\Http\Controllers;
use App\Models\cat_ciudad;


use Illuminate\Http\Request;

class CiudadController extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }

    public function alta()
    {
        return view('pagina.ciudades.alta');

    }
    
    public function lista()
    {
        $ciudades = cat_ciudad::all();
        return view ('pagina.ciudades.lista')
        ->with('ciudades', $ciudades);
    }

    public function store(request $request)
    {
        $ciudad = new cat_ciudad();
        $ciudad->nombre = $request->nombre;
        // return ($proveedores);
        // $ciudad->save();
        if ($ciudad->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
        // return redirect('lista-ciudades');
    }

    public function edit($id)
    {
        $ciudades = cat_ciudad::find($id);
        return view('pagina.ciudades.edit')
        ->with('ciudades', $ciudades);
    }

    public function update(Request $request, $id)
    {
        $ciudades = cat_ciudad::find($id);
        $ciudades->nombre = $request->nombre;
        // $ciudades->save();
        if ($ciudades->save()) return back()->with('msj', "Los datos se guardado correctamente!");
        else return back();
        // return redirect('lista-ciudades');
    }

    public function destroy($id)
    {
        $ciudad = cat_ciudad::find($id);
        // $ciudad->delete();
        if ($ciudad->delete()) return back()->with('msj', "Los datos se eliminaron correctamente!");
        else return back();

        // return redirect('lista-ciudades');   
    }

}
