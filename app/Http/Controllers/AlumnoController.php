<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grupo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /*
    public function lista()
    {

        $alumnos = Alumno::all();
        $consulta = DB::select('SELECT * FROM alumnos');
        $query = DB::table('alumnos')->get();

        $alumnos2 = Alumno::orderBy('id_alumno');
        $consulta2 = DB::select('SELECT * FROM alumnos ORDER BY id_alumno');
        $query = DB::table('alumnos')->orderBy('id_alumno', 'desc')->get();

        return view("lista")
            ->with(['alumnos1' => $alumnos])
            ->with(['alumnos2' => $consulta])
            ->with(['alumnos3' => $query]);
    }
    */

    public function lista(Request $request){
        if($request->buscar !=''){
            $alumnos = Alumno::Buscar($request)->orderBy('id_alumno')->paginate(15);
        }else{
            if($request->id_grupo>'0'){
                $alumnos=Alumno::Grupo($request)->orderBy('id_alumno')->paginate(15);
            }else if($request->genero !=''){
                $alumnos=Alumno::Genero($request)->orderBy('id_alumno')->paginate(15);
            }else{$alumnos=Alumno::paginate(15);}
        }
        $grupos = Grupo::all();
        return view('lista')
            ->with(['alumnos1' => $alumnos])
            ->with(['grupos' => $grupos]);
    }

    public function detalle($id)
    {
        $alumno = Alumno::find($id);
        return view("detalle")
            ->with(["alumno" => $alumno]);
    }

    public function nuevo()
    {
        $grupos = Grupo::all();
        return view("nuevo")->with(['grupos' => $grupos]);
    }

    public function guardar(Request $request)
    {
        $this->validate($request, [
            'matricula' => 'required',
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'fn' => 'required',
            'email' => 'required',
            'pass' => 'required',
        ]);

        if ($request->file('foto') != '') {
            $file = $request->file('foto');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            Storage::disk('local')->put($foto2, File::get($file));
        } else {
            $foto2 = "uno.png";
        }

        $query = Alumno::create(array(
            'matricula' => $request->input('matricula'),
            'nombre' => $request->input('nombre'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'fn' => $request->input('fn'),
            'gen' => $request->input('gen'),
            'email' => $request->input('email'),
            'pass' => $request->input('pass'),
            'foto' => $foto2,
            'id_grupo' => $request->input('id_grupo')
        ));

        return redirect()->route('lista');
    }

    public function editar(Alumno $id)
    {
        $grupos = Grupo::all();

        return view("editar")->with(['alumno' => $id])->with(['grupos' => $grupos]);
    }

    public function salvar(Alumno $id, Request $request)
    {

        $this->validate($request, [
            'matricula' => 'required',
            'nombre' => 'required',
            'app' => 'required',
            'apm' => 'required',
            'fn' => 'required',
            'email' => 'required',
            'pass' => 'required',
        ]);

        if ($request->file('foto1') != '') {
            $file = $request->file('foto1');
            $foto = $file->getClientOriginalName();
            $date = date('Ymd_His_');
            $foto2 = $date . $foto;
            Storage::disk('local')->put($foto2, File::get($file));
            if($request->foto2!='uno.png'){Storage::disk('local')->delete($request->foto2);}
        } else {
            $foto2 = $request->foto2;
        }

        $query = Alumno::find($id->id_alumno);
        $query->matricula = $request->matricula;
        $query->nombre = trim($request->nombre);
        $query->app = trim($request->app);
        $query->apm = trim($request->apm);
        $query->fn = $request->fn;
        $query->gen = $request->gen;
        $query->email = trim($request->email);
        $query->pass = $request->pass;
        $query->foto = $foto2;
        $query->id_grupo = $request->id_grupo;
        $query->save();

        return redirect()->route("detalle",['id'=>$id->id_alumno]);
    }

    public function borrar(Alumno $id){
        if($id->foto!='uno.png'){
            Storage::disk('local')->delete($id->foto);
        }
        $id->delete();
        return redirect()->route("lista");
    }
}
