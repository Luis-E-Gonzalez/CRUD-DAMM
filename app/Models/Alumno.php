<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id_alumno';

    protected $fillable = [
        'matricula',
        'nombre',
        'app',
        'apm',
        'gen',
        'fn',
        'foto',
        'id_grupo',
        'email',
        'pass'
    ];

    public function scopeGenero($query,$request){
        if($request->genero){
            $query->where('gen',$request->genero);
        }
    }

    public function scopeBuscar($query, $request){
        if($request->buscar && $request->id_grupo && $request->genero){
            $query->where(DB::raw("CONCAT(app, '', apm, ',',nombre)"),"LIKE",'%'.$request->buscar.'%')->where('id_grupo',$request->id_grupo)->where('gen',$request->genero);
        }else if($request->buscar && $request->id_grupo){
            $query->where(DB::raw("CONCAT(app, '', apm, ',',nombre)"),"LIKE",'%'.$request->buscar.'%')->where('id_grupo',$request->id_grupo);
        }else if($request->buscar && $request->genero){
            $query->where(DB::raw("CONCAT(app, '', apm, ',',nombre)"),"LIKE",'%'.$request->buscar.'%')->where('gen',$request->genero);
        }else{$query->where(DB::raw("CONCAT(app, '', apm, ',',nombre)"),"LIKE",'%'.$request->buscar.'%');}
    }

    public function scopeGrupo($query,$request){
        if($request->id_grupo && $request->genero){
            $query->where('id_grupo',$request->id_grupo)->where('gen',$request->genero);
        } else{$query->where('id_grupo',$request->id_grupo);}
    }
}
