<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscripcion extends Model
{
    protected $table = 'inscripciones';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = [
        'alumno_id',
        'cicloescolar_id',
        'foliio'
    ];

    protected $hidden = ['updated_at'];

    public static $rules = [
        'alumno_id' => 'required',
        'cicloescolar_id' => 'required',
        'folio' => 'required|unique:inscripciones'
    ];

    /************************************ R E L A C I O N E S ******************************************************* */
    public function turnos()
    {
        return $this->belongsToMany('App\Models\Turno', 'aulasasignadas')
            ->withPivot('aula_id', 'docente_id', 'grado_id', 'grupo_id')
            ->withTimestamps();
    }
    public function grupos()
    {
        return $this->belongsToMany('App\Models\Grupo', 'aulasasignadas')
            ->withPivot('aula_id', 'docente_id', 'grado_id', 'turno_id')
            ->withTimestamps();
    }
    public function grados()
    {
        return $this->belongsToMany('App\Models\Grado', 'aulasasignadas')
            ->withPivot('aula_', 'docente_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function docentes()
    {
        return $this->belongsToMany('App\Models\Docente', 'aulasasignadas')
            ->withPivot('aula_id', 'grado_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function aulas()
    {
        return $this->belongsToMany('App\Models\Aula', 'aulasasignadas')
            ->withPivot('docente_id', 'grado_id', 'grupo_id', 'turno_id')
            ->withTimestamps();
    }
    public function centrotrabajo()
    {
        return $this->belongsTo('App\Models\Centrotrabajo');
    }
    public function alumno()
    {
        return $this->belongsTo('App\Models\Alumno');
    }
}
