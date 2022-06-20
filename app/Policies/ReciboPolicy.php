<?php

namespace App\Policies;

use App\Models\Recibo;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReciboPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->tipo == 'A' || $user->tipo == 'F';
    }

    public function view(User $user, Recibo $recibo)
    {
        return $user->tipo == 'C' && $user->id == $recibo->cliente_id;
    }

    public function create(User $user)
    {
        return $user->tipo == 'A' || $user->tipo == 'F';
    }

    public function update(User $user, Recibo $recibo)
    {
        return false;
    }

    public function delete(User $user, Recibo $recibo)
    {
        return false;
    }

    public function store(User $user, Recibo $recibo)
    {
        //
    }

    public function restore(User $user, Recibo $recibo)
    {
        //
    }

    public function forceDelete(User $user, Recibo $recibo)
    {
        //
    }
}
