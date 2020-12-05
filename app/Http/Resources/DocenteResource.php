<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocenteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'centrotrabajo_id' => $this->centrotrabajo_id,
            'user_id' => $this->user_id,
            'rfc' => $this->rfc,
            'curp' => $this->curp,
            'nombre' => $this->nombre,
            'appaterno' => $this->appaterno,
            'apmaterno' => $this->apmaterno,
            'domicilio' => $this->domicilio,
            'localidad' => $this->localidad,
            'municipio' => $this->municipio,
            'estado'    => $this->estado,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'deleted_at' => $this->deleted_at
        ];
    }
}
