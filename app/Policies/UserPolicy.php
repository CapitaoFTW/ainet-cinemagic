<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->tipo == 'A';
    }

    public function view(User $user)
    {
        return $user->tipo == 'A'; //|| $user->id == $user->id;
    }

    public function create(User $user)
    {
        return $user->tipo == 'A';
    }

    public function update(User $user)
    {
        return $user->tipo == 'A';//$user->id == $user->user_id;
    }

    public function delete(User $user)
    {
        return $user->tipo == 'A';// && $user->id != $user->user_id;
    }

    public function bloquear_desbloquear(User $user) {

        return $user->tipo == 'A';// && $user->id != $user->user_id;
    }

    public function restore(User $user)
    {
        //
    }

    public function forceDelete(User $user)
    {
        //
    }
}
