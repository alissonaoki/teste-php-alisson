<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens; // Importe a classe HasApiTokens
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens; // Use o trait HasApiTokens

    protected $fillable = [
        'codigo_unico',
        'nome',
        'email',
        'password',
        'nivel',
    ];

    // Relacionamento com grupos (um usuário pode ter muitos grupos)
    public function grupos()
    {
        return $this->hasMany(Grupo::class);
    }

    // Método para atribuir um grupo a um usuário (gerente)
    public function atribuirGrupo(Grupo $grupo)
    {
        $this->grupos()->save($grupo);
    }
}
