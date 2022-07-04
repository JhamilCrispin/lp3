<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use Illuminate\Http\Request;

class PublicacionController extends Controller
{
    public function mostrar(){
        $citas = Publicacion::all();
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
        $citas = new Publicacion();
        $citas->fechaCita=$request->input('fechaCita');
        $citas->idUsuario=$request->input('idUsuario');
        $citas->save();
        return redirect("cita/mostrar");
    }
}
