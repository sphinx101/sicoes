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
        'estado'           => 'required'
    ];

    /****************************  R E L A C I O N E S  *********************************************/
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function centrotrabajo()
    {
        return $this->belongsTo('App\Models\Centrotrabajo');
    }
}
