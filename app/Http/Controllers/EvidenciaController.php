<?php

namespace App\Http\Controllers;

use App\Models\Evidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvidenciaController extends Controller
{
    public function mostrar($id){
        $detalles = Evidencia::paginate(7)->where('idTrabajo', $id);
        return view('detalles')->with('detalles',$detalles);
    }
    public function formulario(){
        return view('detalles');
    }
    public function guardar(Request $request,$id){
        $request->validate([
            "titulo"=> "required",
            "descripcion"=> "required|",
        ]);
        $detalles = new Evidencia();
        $detalles->titulo=$request->input('titulo');
        $detalles->descripcion=$request->input('descripcion');
        $detalles->fecha=now();
        $detalles->idTrabajo=$id;
        $detalles->save();
        return redirect(route('detalles.mostrar',$id));
    }
}
