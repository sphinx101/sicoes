<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    protected $table = 'docentes';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'centrotrabajo_id',
        'user_id',
        'rfc',
        'curp',
        'nombre',
        'appaterno',
        'apmaterno',
        'domicilio',
        'localidad',
        'municipio',
        'estado',
        'telefono',
        'celular'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'centrotrabajo_id' => 'required',
        'rfc'              => 'required|unique:docentes|min:10|max:13',
        'curp'             => 'required|unique:docentes|min:18|max:18',
        'nombre'           => 'required',
        'appaterno'        => 'required',
        'domicilio'        => 'required',
        'localidad'        => 'required',
        'municipio'        => 'required',
        'estado'           => 'required',
        'email'            => 'required|string|email|max:255|unique:users',
        'type'             => 'required'
    ];

    /****************************  R E L A C I O N E S  *********************************************/
    public function aulas()
    {
        return $this->hasMany('App\Models\Aula');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function centrotrabajo()
    {
        return $this->belongsTo('App\Models\Centrotrabajo');
    }

    /****************************** A C C E S O R E S ****************************** */
    public function getNombreCompletoAttribute()
    {
        return $this->nombre . ' ' . $this->appaterno . ' ' . $this->apmaterno;
    }
}
