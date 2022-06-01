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
        return view('pagina.ciudades.alta');/*  */

    }
    
    public function lista()
    {
        $ciudades = cat_ciudad::all();
        return view ('pagina.ciudades.lista')
        ->with('ciudades', $ciudades);
    }

    public function store(request $request)
    {
        if ( $this->validate($request,[
            'nombre' => 'required|min:3|max:25|unique:cat_ciudad,nombre',
        ])) { 
            $ciudad = new cat_ciudad();
            $ciudad->nombre = $request->nombre;
            if ($ciudad->save()) return redirect("/lista-ciudades")->with('msj', "Los datos se guardado correctamente!");
            else return back();
        }
    

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
        if ($ciudades->save()) return redirect("/lista-ciudades")->with('msj', "Los datos se guardado correctamente!");
        else return back();
        // return redirect('lista-ciudades');
    }

    public function destroy($id)
    {
        $ciudad = cat_ciudad::find($id);
        if ($ciudad->delete()) return redirect("/lista-ciudades")->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
    }

}
