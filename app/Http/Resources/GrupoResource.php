<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GrupoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo_unico' => $this->codigo_unico,
            'nome' => $this->nome,
        ];
    }
}
