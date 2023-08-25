<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'codigo_unico',
        'cnpj',
        'nome',
        'data_fundacao',
    ];

    // Relacionamento com grupos (um cliente pertence a um grupo)
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    // Método para atribuir um cliente a um grupo específico
    public function atribuirGrupo(Grupo $grupo)
    {
        $this->grupo()->associate($grupo);
        $this->save();
    }

    // Método para desassociar um cliente de um grupo
    public function removerGrupo()
    {
        $this->grupo()->dissociate();
        $this->save();
    }
}
