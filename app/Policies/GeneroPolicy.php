<?php

namespace App\Policies;

use App\Models\Genero;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GeneroPolicy
{
    use HandlesAuthorization;

    // If user is admin, authorization check always return true
    // Admin user is granted all previleges over "Genero" entity
    public function before($user, $ability)
    {
        return $user->tipo == 'A';
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Genero $genero)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Genero $genero)
    {
        return false;
    }

    public function delete(User $user, Genero $genero)
    {
        return false;
    }

    public function restore(User $user, Genero $genero)
    {
        //
    }

    public function forceDelete(User $user, Genero $genero)
    {
        //
    }
}
