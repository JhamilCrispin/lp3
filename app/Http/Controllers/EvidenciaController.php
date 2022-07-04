<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use Illuminate\Http\Request;

class EvidenciaController extends Controller
{
    public function mostrar(){
        $citas = Evidencia::all();
        return view('cita.mostrar')->with('citas',$citas);
    }
    public function formulario(){
        return view('cita.guardar');
    }
    public function Evidencia(Request $request){
        $request->validate([
            "fechaCita"=> "required",
            "idUsuario"=> "required|",
        ]);
        $citas = new Cita();
        $citas->fechaCita=$request->input('fechaCita');
        $citas->idUsuario=$request->input('idUsuario');
        $citas->save();
        return redirect("cita/mostrar");
    }
}
