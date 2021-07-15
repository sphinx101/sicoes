<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cicloescolar extends Model
{
    protected $table = 'cicloescolares';

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillables = ['nombre'];
    protected $hidden = ['created_at', 'updated_at'];

    public static $rules = [
        'nombre' => 'required'
    ];

    /**********************************************  R E L A C I O N E S ****************************** */
    public function inscripciones()
    {
        return $this->hasMany('App\Models\Inscripciones');
    }
}
