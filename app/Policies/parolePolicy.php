<?php

namespace App\Policies;

use App\Models\User;
use App\Models\parole;
use App\Enum\UserRoleEnum;
use Illuminate\Auth\Access\HandlesAuthorization;

class parolePolicy
{
    use HandlesAuthorization;


    // public function viewAny(User $user)
    // {
    // }


    // public function view(User $user, parole $parole)
    // {
    //     return $user->id == $parole->User_Id && $user->role == UserRoleEnum::Manager || $user->role == UserRoleEnum::Admin;
    // }


    public function create(User $user)
    {
        return $user->role == UserRoleEnum::Manager;
    }


    public function update(User $user, parole $parole)
    {
        return $user->id == $parole->User_Id && $user->role == UserRoleEnum::Manager;
    }


    public function delete(User $user, parole $parole)
    {
        return $user->id == $parole->User_Id && $user->role == UserRoleEnum::Manager;
    }
}
