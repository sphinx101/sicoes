<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grado extends Model
{
    protected $table = 'grados';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = ['nom_grado'];
    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'nom_grado' => 'required'
    ];

    /**********************************************  R E L A C I O N E S ****************************** */
    public function turnos()
    {
        return $this->belongsToMany('App\Models\Turno', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'docente_id', 'grupo_id')
            ->withTimestamps();
    }
    public function grupos()
    {
        return $this->belongsToMany('App\Models\Grupo', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'docente_id', 'turno_id')
            ->withTimestamps();
    }
    public function docentes()
    {
        return $this->belongsToMany('App\Models\Docente', 'aulasasignadas')
            ->withPivot('aula_id', 'inscripcion_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function aulas()
    {
        return $this->belongsToMany('App\Models\Aula', 'aulasasignadas')
            ->withPivot('inscripcion_id', 'docente_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function inscripciones()
    {
        return $this->belongsToMany('App\Models\Inscripcion', 'aulasasignadas')
            ->withPivot('aula_', 'docente_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
}
