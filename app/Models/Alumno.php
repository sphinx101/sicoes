<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alumno extends Model
{
    protected $table = 'alumnos';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = [
        'centrotrabajo_id',
        'user_id',
        'curp',
        'nombre',
        'appaterno',
        'apmaterno',
        'domicilio',
        'localidad',
        'municipio'
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'centrotrabajo_id' => 'required',
        'curp'             => 'required|unique:alumnos|min:18|max:18',
        'nombre'           => 'required',
        'appaternio'       => 'required',
        'apmaterno'        => 'required',
        'domicilio'        => 'required',
        'localidad'        => 'required',
        'municipio'        => 'required',
        'email'            => 'required|string|email|max:255|unique:users'
    ];

    /**************************** R E L A C I O N E S ******************************* */
    public function inscripciones()
    {
        return $this->hasMany('App\Models\Inscripciones');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function centrotrabajo()
    {
        return $this->belongsTo('App\Models\Centrotrabajo');
    }
}
