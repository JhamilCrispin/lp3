<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use Illuminate\Http\Request;

class AsociacionController extends Controller
{
    public function mostrar(){
        $citas = Asociacion::all();
        return view('cita.mostrar')->with('citas',$citas);
    }
    public function formulario(){
        return view('cita.guardar');
    }
    public function guardar(Request $request){
        $request->validate([
            "fechaCita"=> "required",
            "idUsuario"=> "required|",
        ]);
        $citas = new Asociacion();
        $citas->fechaCita=$request->input('fechaCita');
        $citas->idUsuario=$request->input('idUsuario');
        $citas->save();
        return redirect("cita/mostrar");
    }
}
