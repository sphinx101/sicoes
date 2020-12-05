<?php

namespace App\Repositorios;

use App\User;
use Exception;
use App\Models\Docente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RequestCreateDocente;


class DocenteRepo
{

    protected $docente = null;

    public function store(RequestCreateDocente $data)
    {

        try {

            DB::transaction(function () use ($data) {
                $puesto = \App\Models\Role::where('id', $data['type'])->first()->name;
                $user = User::create([
                    'name' => $data['nombre'],
                    'email' => $data['email'],
                    'type' => $puesto,
                    'password' => bcrypt('12345678')
                ]);
                $rol = \App\Models\Role::where('id', $data['type'])->get();
                $user->attachRole($rol[0]);
                $newdocente = $user->docente()->create([
                    'centrotrabajo_id' => $data['centrotrabajo_id'],
                    'rfc'              => $data['rfc'],
                    'curp'             => $data['curp'],
                    'nombre'           => $data['nombre'],
                    'appaterno'        => $data['appaterno'],
                    'apmaterno'        => $data['apmaterno'],
                    'domicilio'        => $data['domicilio'],
                    'localidad'        => $data['localidad'],
                    'municipio'        => $data['municipio'],
                    'estado'           => $data['estado'],
                    'telefono'         => $data['telefono'],
                    'celular'          => $data['celular']
                ]);
                $this->docente = $newdocente;
            });
        } catch (Exception $error) {

            return [
                'errors' => [
                    'message' => $error->getMessage(),
                    'code' => $error->getCode(),
                ],
                'success' => false
            ];
        }

        return  [
            'data' => $this->docente,
            'success' => true
        ];
    }

    public static function hasUserDocente()
    {
        $user = User::find(Auth::id());
        return $user->docente != null ? true : false;
    }
}
