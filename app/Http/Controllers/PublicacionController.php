<?php

namespace App\Http\Controllers;

use App\Models\Publicacion;
use App\Models\User;
use App\Models\Trabajo;
use Illuminate\Http\Request;
use DB;

class PublicacionController extends Controller
{
    public function mostrar($id){
        $trabajador = Trabajo::join('users', 'trabajos.idUsuario', '=', 'users.id')
            ->where('trabajos.id',$id)
            ->select('trabajos.id','trabajos.trabajo','trabajos.descripcion','trabajos.categoria','trabajos.precio','trabajos.experiencia','trabajos.img','users.nombre','users.apellido','users.dni','users.email','users.tipo')
            ->get();
        return view('publicacion')->with('trabajador', $trabajador);

        /*return DB::table('users')
            ->join('trabajos', 'users.id', '=', 'trabajos.idUsuario')
            ->where('trabajos.id',$id)
            ->get();*/
    }

}
