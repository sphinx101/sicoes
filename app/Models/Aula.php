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
    public function turnos()
    {
        return $this->belongsToMany('App\Models\Turno', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'docente_id', 'grado_id', 'grupo_id')
            ->withTimestamps();
    }
    public function grupos()
    {
        return $this->belongsToMany('App\Models\Grupo', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'docente_id', 'grado_id', 'turno_id')
            ->withTimestamps();
    }
    public function grados()
    {
        return $this->belongsToMany('App\Models\Grado', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'docente_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function docentes()
    {
        return $this->belongsToMany('App\Models\Docente', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'grado_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function inscripciones()
    {
        return $this->belongsToMany('App\Models\Inscripcion', 'aulasasignadas')
            ->withPivot('docente_id', 'grado_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
}
