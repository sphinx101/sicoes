<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Centrotrabajo extends Model
{
    protected $table = 'centrotrabajos';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = ['cct', 'nombre'];

    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'cct'       => 'required|unique:centrotrabajos',
        'nombre'    => 'required'
    ];

    /***************************  R E L A C I O N E S ******************************** */
    public function docentes()
    {
        return $this->hasMany('App\Models\Docente');
    }
}
