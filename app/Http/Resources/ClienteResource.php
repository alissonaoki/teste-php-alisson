<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'codigo_unico' => $this->codigo_unico,
            'cnpj' => $this->cnpj,
            'nome' => $this->nome,
            'data_fundacao' => $this->data_fundacao,
            'grupo_id' => $this->grupo_id,
        ];
    }
}
