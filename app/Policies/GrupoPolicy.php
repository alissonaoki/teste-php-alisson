<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Grupo;
use Illuminate\Auth\Access\HandlesAuthorization;

class GrupoPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Grupo $grupo)
    {
        // Permite a visualização de grupos para todos os gerentes autenticados.
        return true;
    }

    public function create(User $user)
    {
        // Permite a criação de novos grupos apenas para gerentes de nível dois (nível 2).
        return $user->nivel === 2;
    }

    public function update(User $user)
    {
        // Permite a edição de grupos apenas para gerentes de nível dois (nível 2).
        return $user->nivel === 2;
    }

    public function delete(User $user)
    {
        // Permite a exclusão de grupos apenas para gerentes de nível dois (nível 2).
        return $user->nivel === 2;
    }
}
