<?php

namespace App\Policies;

use App\Models\Lugar;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class LugarPolicy
{
    use HandlesAuthorization;

    // If user is admin, authorization check always return true
    // Admin user is granted all previleges over "Lugar" entity
    public function before($user, $ability)
    {
        return $user->tipo == 'A';
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Lugar $lugar)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Lugar $lugar)
    {
        return false;
    }

    public function delete(User $user, Lugar $lugar)
    {
        return false;
    }

    public function restore(User $user, Lugar $lugar)
    {
        //
    }

    public function forceDelete(User $user, Lugar $lugar)
    {
        //
    }
}
