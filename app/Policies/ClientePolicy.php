<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Cliente;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    public function view(User $user, Cliente $cliente)
    {
        // Permite a visualização de clientes para todos os gerentes autenticados.
        return true;
    }

    public function create(User $user)
    {
        // Permite a criação de novos clientes para todos os gerentes autenticados.
        return true;
    }

    public function delete(User $user, Cliente $cliente)
    {
        // Permite a remoção de clientes para todos os gerentes autenticados.
        return true;
    }
}
