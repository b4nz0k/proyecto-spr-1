<?php

namespace App\Http\Controllers;
use App\Models\cat_entidad;


use Illuminate\Http\Request;

class EntidadController extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }

    public function alta()
    {
        return view('pagina.entidades.alta');

    }
    
    public function lista()
    {
        $entidades = cat_entidad::all();
        return view ('pagina.entidades.lista')
        ->with('entidades', $entidades);
    }

    public function store(request $request)
    {
        $entidad = new cat_entidad();
        $entidad->nombre = $request->nombre;
        $entidad->abrev = $request->abrev;
        $entidad->pob_tot = $request->pob_tot;
        $entidad->pob_masc = $request->pob_masc;
        $entidad->pob_fem = $request->pob_fem;

        // return ($entidad);
        $entidad->save();

        return redirect('lista-entidades');
    }

    public function edit($id)
    {
        $entidades = cat_entidad::find($id);
        return view('pagina.entidades.edit')
        ->with('entidades', $entidades);
    }

    public function update(Request $request, $id)
    {
        $entidades = cat_entidad::find($id);
        $entidades->nombre = $request->nombre;
        $entidades->abrev = $request->abrev;
        $entidades->pob_tot = $request->pob_tot;
        $entidades->pob_masc = $request->pob_masc;
        $entidades->pob_fem = $request->pob_fem;
        $entidades->save();
        return redirect('lista-entidades');
    }

    public function destroy($id)
    {
        $entidad = cat_entidad::find($id);
        $entidad->delete();
        return redirect('lista-entidades');   
    }
}
