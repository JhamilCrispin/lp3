<?php

namespace App\Http\Controllers;

use App\Models\Asociacion;
use App\Models\User;
use Illuminate\Http\Request;

class AsociacionController extends Controller
{
    public function mostrarUsuario(){
        $usuarios = User::orderBy('id')->paginate(7);
        return view('administrador.mostrar')->with('usuarios',$usuarios);
    }
    public function update(Request $request,$id){
        $usuarios = User::find($id);
        $usuarios->tipo = $request->tipo;
        $usuarios->empresa = $request->empresa;
        if ($usuarios->save()){
            return redirect('/administrador/mostrar')->with('edit','Datos Actualizados');
        }else{
            mostrarUsuario();
        }
    }
}
