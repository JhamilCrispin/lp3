<?php

namespace App\Http\Controllers;
use App\Models\Trabajo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class TrabajoController extends Controller
{
    public function mostrar(){
        $trabajos = Trabajo::orderBy('id')->paginate(7);
        return view('trabajos.ver')->with('trabajos',$trabajos);
    }
    public function mostrarmio(){
        $trabajos = Trabajo::orderBy('id')->where('idUsuario',Auth::user()->id)->paginate(7);
        return view('trabajos.ver')->with('trabajos',$trabajos);
    }
    public function formulario(){
        return view('trabajos.guardar');
    }
    public function guardar(Request $request,){
        $request->validate([
            "nombre"=> "required",
            "descripcion"=> "required",
            "experiencia"=> "numeric|required|",
            "categoria"=> "required|",
        ]);
        $mascotas = new Trabajo();
        $mascotas->nombre=$request->input('nombre');
        $mascotas->descripcion=$request->input('descripcion');
        $mascotas->experiencia=$request->input('experiencia');
        $mascotas->categoria=$request->input('categoria');
        $mascotas->idUsuario=Auth::user()->id;
        $mascotas->save();
        return redirect("trabajos/ver")->with('success','Registro correcto');
    }
}
