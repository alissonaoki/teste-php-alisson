<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'codigo_unico',
        'nome',
    ];

    // Relacionamento com clientes (um grupo tem muitos clientes)
    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }
}
