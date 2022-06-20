<?php

namespace App\Policies;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->tipo == 'A';
    }

    public function view(User $user, Cliente $cliente)
    {
        return $user->tipo == 'A' || $user->id == $cliente->id;
    }

    public function create(User $user, Cliente $cliente)
    {
        return $user->id == $cliente->id;
    }

    public function update(User $user, Cliente $cliente)
    {
        return $user->id == $cliente->id;
    }

    public function delete(User $user, Cliente $cliente)
    {
        return $user->tipo == 'A';
    }

    public function bloquear_desbloquear(User $user)
    {
        return $user->tipo == 'A';
    }

    public function restore(User $user, Cliente $cliente)
    {
        //
    }

    public function forceDelete(User $user, Cliente $cliente)
    {
        //
    }
}
