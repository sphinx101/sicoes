<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turno extends Model
{
    protected $table = 'turno';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = ['nom_turno'];
    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'nom_turno' => 'required'
    ];

    /**********************************************  R E L A C I O N E S ****************************** */
    public function grupos()
    {
        return $this->belongsToMany('App\Models\Grupo', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'docente_id', 'grado_id')
            ->withTimestamps();
    }
    public function grados()
    {
        return $this->belongsToMany('App\Models\Grado', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'docente_id', 'grupo_id')
            ->withTimestamps();
    }
    public function docentes()
    {
        return $this->belongsToMany('App\Models\Docente', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'grado_id', 'grupo_id')
            ->withTimestamps();
    }
    public function aulas()
    {
        return $this->belongsToMany('App\Models\Aula', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'docente_id', 'grado_id', 'grupo_id')
            ->withTimestamps();
    }
    public function inscripciones()
    {
        return $this->belongsToMany('App\Models\Inscripcion', 'aulasasignadas')
            ->withPivot('aula_id', 'docente_id', 'grado_id', 'grupo_id')
            ->withTimestamps();
    }
}
