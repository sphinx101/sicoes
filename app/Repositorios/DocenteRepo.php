<?php

namespace App\Repositorios;

use App\User;
use Illuminate\Support\Facades\Auth;

class DocenteRepo
{
    public static function hasUserDocente()
    {
        $user = User::find(Auth::id());
        return $user->docente != null ? true : false;
    }
}
