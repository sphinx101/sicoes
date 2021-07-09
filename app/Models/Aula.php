<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aula extends Model
{

    protected $table = 'aulas';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = [
        'docente_id',
        'turno_id',
        'grupo_id',
        'grado_id',
        'cicloescolar_id'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'docente_id' => 'required',
        'turno_id' => 'required',
        'grupo_id' => 'required',
        'grado_id' => 'required',
        'cicloescolar_id' => 'required'
    ];

    /*************************************** R E L A C I O N E S **************************************** */
    public function turno()
    {
        return $this->belongsTo('App\Models\Turno');
    }
    public function grupo()
    {
        return $this->belongsTo('App\Models\Grupo');
    }
    public function grado()
    {
        return $this->belongsTo('App\Models\Grado');
    }
    public function cicloescolar()
    {
        return $this->belongsTo('App\Models\Cicloescolar');
    }
    public function docente()
    {
        return $this->belongsTo('App\Models\Docente');
    }
    public function alumnos()
    {
        // relacion muchos a muchos con tabla pivote "inscripciones"
        return $this->belongsToMany('App\Models\Alumno', 'inscripciones')->withTimestamps();
    }
}
