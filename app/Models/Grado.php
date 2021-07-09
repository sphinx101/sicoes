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
    public function aulas()
    {
        return $this->hasMany('App\Models\Aula');
    }
}
