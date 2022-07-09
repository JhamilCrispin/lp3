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
        print_r($request->all());
        $request->validate([
            "trabajo"=> "required",
            "descripcion"=> "required",
            "experiencia"=> "required|",
            "categoria"=> "required|",
            "precio"=> "required|",
        ]);
        $trabajos = new Trabajo();
        if($request->hasFile('img')){
            $file = $request->file('img');
            $desinationPath = 'img/fotos/';
            $filename= time().'.'.$file->getClientOriginalExtension();
            $uploadSuccess = $request->file('img')->move($desinationPath,$filename);
            $trabajos->img = $desinationPath.$filename;
        }
        $trabajos->trabajo=$request->input('trabajo');
        $trabajos->descripcion=$request->input('descripcion');
        $trabajos->experiencia=$request->input('experiencia');
        $trabajos->categoria=$request->input('categoria');
        $trabajos->precio=$request->input('precio');
        $trabajos->idUsuario=Auth::user()->id;
        $trabajos->save();
        return redirect("trabajos/ver")->with('success','Registro correcto');
    }
    public function update(Request $request,$id){
        $trabajos = Trabajo::find($id);

        if($request->hasFile('img')){
            $file = $request->file('img');
            $desinationPath = 'img/fotos/';
            $filename= time().'.'.$file->getClientOriginalExtension();
            $uploadSuccess = $request->file('img')->move($desinationPath,$filename);
            $trabajos->img = $desinationPath.$filename;
        }
        $trabajos->trabajo = $request->trabajo;
        $trabajos->descripcion = $request->descripcion;
        $trabajos->experiencia = $request->experiencia;
        $trabajos->precio = $request->precio;
        if ($trabajos->save()){
            return redirect('/trabajos/ver')->with('edit','Datos Actualizados');
        }else{
            index();
        }
    }

    public function destroy($id){
        Trabajo::destroy($id);
        return redirect("trabajos/ver")->with('destroy','Datos eliminados');
    }

}
