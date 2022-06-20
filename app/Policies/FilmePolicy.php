<?php

namespace App\Policies;

use App\Models\Filme;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FilmePolicy
{
    use HandlesAuthorization;

    // If user is admin, authorization check always return true
    // Admin user is granted all previleges over "Filme" entity
    public function before($user)
    {
        return $user->tipo == 'A';
    }

    public function viewAny(User $user)
    {
        return false;
    }

    public function view(User $user, Filme $filme)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Filme $filme)
    {
        return false;
    }

    public function delete(User $user, Filme $filme)
    {
        return false;
    }

    public function restore(User $user, Filme $filme)
    {
        //
    }

    public function forceDelete(User $user, Filme $filme)
    {
        //
    }
}
