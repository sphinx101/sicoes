<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grupo extends Model
{
    protected $table = 'grupos';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = ['nom_grupo'];
    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'nom_grupo' => 'required'
    ];

    /**********************************************  R E L A C I O N E S ****************************** */
    public function turnos()
    {
        return $this->belongsToMany('App\Models\Turno', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'docente_id', 'grado_id')
            ->withTimestamps();
    }
    public function grados()
    {
        return $this->belongsToMany('App\Models\Grado', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'docente_id', 'turno_id')
            ->withTimestamps();
    }
    public function docentes()
    {
        return $this->belongsToMany('App\Models\Docente', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'grado_id', 'turno_id')
            ->withTimestamps();
    }
    public function aulas()
    {
        return $this->belongsToMany('App\Models\Aula', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'docente_id', 'grado_id', 'turno_id')
            ->withTimestamps();
    }
    public function inscripciones()
    {
        return $this->belongsToMany('App\Models\Inscripcion', 'aulasasignadas')
            ->withPivot('aula_id', 'docente_id', 'grado_id', 'turno_id')
            ->withTimestamps();
    }
}
