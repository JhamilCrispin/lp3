<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function mostrar(){
        $citas = Comentario::all();
        return view('cita.mostrar')->with('citas',$citas);
    }
    public function formulario(){
        return view('cita.guardar');
    }
    public function Comentario(Request $request){
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
