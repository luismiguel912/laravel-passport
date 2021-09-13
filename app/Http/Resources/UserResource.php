<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /*
        ** Accedemos a las propiedades del modelo directamente con la variable $this->propiedad
        */
        return [
            'id_user' => $this->id,
            'nombre_usuario' => $this->name,
            'correo_electronico' => $this->email,
        ];
    }
}
