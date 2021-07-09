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
    public function aulas()
    {
        return $this->hasMany('App\Models\Aula');
    }
}
