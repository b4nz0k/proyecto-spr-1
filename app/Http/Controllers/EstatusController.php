<?php

namespace App\Http\Controllers;
use App\Models\cat_estatus;
use Illuminate\Http\Request;

class EstatusController extends Controller
{
    public function __construct()    {
        $this->middleware('auth');
    }

    public function alta()
    {
        return view('pagina.estatus.alta');
    }
    
    public function lista()
    {
        $estatus = cat_estatus::all();
        return view ('pagina.estatus.lista')
        ->with('estatus', $estatus);
    }

    public function store(request $request)
    { 
        if ( $this->validate($request,[
            'estatus' => 'required|min:3|max:25|unique:cat_estatus,estatus',
        ])) {
        $estatus = new cat_estatus();
        $estatus->estatus = $request->estatus;
        // $estatus->save();
        if ($estatus->save()) return redirect("/lista-estatus")->with('msj', "Los datos se guardado correctamente!");
        else return back();
        }
        // return redirect('lista-estatus');
    }

    public function edit($id)
    {
        $estatus = cat_estatus::find($id);
        return view('pagina.estatus.edit')
        ->with('estatus', $estatus);
    }


    public function update(Request $request, $id)
    {
        $estatus = cat_estatus::find($id);
        $estatus->estatus = $request->estatus;
        // $estatus->save();
        if ($estatus->save()) return redirect("/lista-estatus")->with('msj', "Los datos se guardado correctamente!");
        else return back();

        // return redirect('lista-estatus');
    }

    public function destroy($id)
    {
        $estatus = cat_estatus::find($id);
        if ($estatus->delete()) return redirect("/lista-estatus")->with('msj', "Los datos se eliminaron correctamente!");
        else return back();
/*      $estatus->delete();
        return redirect('lista-estatus');     */
    }
}
