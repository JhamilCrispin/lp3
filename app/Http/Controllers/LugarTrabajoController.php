<?php

namespace App\Http\Controllers;

use App\Models\LugarTrabajo;
use Illuminate\Http\Request;

class LugarTrabajoController extends Controller
{
    public function mostrar(){
        $citas = LugarTrabajo::all();
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
        $citas = new LugarTrabajo();
        $citas->fechaCita=$request->input('fechaCita');
        $citas->idUsuario=$request->input('idUsuario');
        $citas->save();
        return redirect("cita/mostrar");
    }
}
