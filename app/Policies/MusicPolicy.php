<?php

namespace App\Policies;

use App\Enum\UserRoleEnum;
use App\Models\Music;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class MusicPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function update(User $user, Music $music)
    {
        return ($this->isAdminOrManager($user) && $user->id === $music->user_id ) ? Response::allow() : Response::deny('You are not allowed to update this music (the music is not yours)');
    }
    public function delete(User $user, Music $music)
    {
        return ($this->isAdminOrManager($user) && $user->id === $music->user_id ? Response::allow() : Response::deny('You are not allowed to delete this music (the music is not yours)'));
    }
    public function store(User $user){
        return $this->isAdminOrManager($user) ? Response::allow() : Response::deny('You are not allowed to store a music');
    }


    private function isAdminOrManager(User $user){
        return $user->role === UserRoleEnum::Admin || $user->role === UserRoleEnum::Manager;
    }
}
