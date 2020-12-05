<?php

namespace App\Repositorios;

use App\Models\Centrotrabajo;

class CentrotrabajoRepo
{
    public function pluckCCT()
    {
        return  Centrotrabajo::pluck('cct', 'id');
    }

    public function mapCCT()
    {
        $cts = Centrotrabajo::all();
        return $cts->map(function ($ct) {
            return [
                'id'     => $ct->id,
                'cct'    => $ct->cct,
                'nombre' => $ct->nombre
            ];
        });
    }
}
