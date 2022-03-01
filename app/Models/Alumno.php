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

    public function scopeBuscar($query, $request){
        if($request->buscar && $request->id_grupo){
            $query->where(DB::raw("CONCAT(app, '', apm, ',',nombre)"),"LIKE",'%'.$request->buscar.'%')->where('id_grupo',$request->id_grupo);
        }else{$query->where(DB::raw("CONCAT(app, '', apm, ',',nombre)"),"LIKE",'%'.$request->buscar.'%');}
    }

    public function scopeGrupo($query,$request){
        if($request->id_grupo){
            $query->where('id_grupo',$request->id_grupo);
        }
    }
}
