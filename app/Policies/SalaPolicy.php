<?php

namespace App\Policies;

use App\Models\Sala;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalaPolicy
{
    use HandlesAuthorization;

    // If user is admin, authorization check always return true
    // Admin user is granted all previleges over "Sala" entity
    public function before($user, $ability)
    {
        return $user->tipo == 'A';
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Sala $sala)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Sala $sala)
    {
        return false;
    }

    public function delete(User $user, Sala $sala)
    {
        return false;
    }

    public function restore(User $user, Sala $sala)
    {
        //
    }

    public function forceDelete(User $user, Sala $sala)
    {
        //
    }
}
