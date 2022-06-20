<?php

namespace App\Policies;

use App\Models\Sessao;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SessaoPolicy
{
    use HandlesAuthorization;

    // If user is admin, authorization check always return true
    // Admin user is granted all previleges over "Sessao" entity
    public function before($user)
    {
        return $user->tipo == 'A';
    }

    public function viewAny(User $user)
    {
        return $user->tipo == 'F';
    }

    public function view(User $user, Sessao $sessao)
    {
        return false;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user, Sessao $sessao)
    {
        return false;
    }

    public function delete(User $user, Sessao $sessao)
    {
        return false;
    }

    public function restore(User $user, Sessao $sessao)
    {
        //
    }

    public function forceDelete(User $user, Sessao $sessao)
    {
        //
    }
}
