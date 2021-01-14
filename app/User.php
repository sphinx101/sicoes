<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'photo_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at'
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //************************** R E L A C I O N E S ************************************** */

    /**
     * docente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function docente()
    {
        return $this->hasOne('App\Models\Docente');
    }

    //************************** A D M I N L T E ****************************************** */

    public function adminlte_image()
    {
        //return 'http://sicoes.homestead/storage/photos/docentes/' . $this->photo_name;
        return env('APP_URL') . '/storage/photos/docentes/' . $this->photo_name;
    }

    public function adminlte_profile_url()
    {
        //return 'profile/username';
        return 'perfil';
    }

    public function adminlte_desc()
    {
        return $this->docente->centrotrabajo->nombre;
    }
}
