<?php

namespace App\Policies;

use App\Models\Music;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

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
        return ($user->role === 'admin' || $user->role === 'manager') && $user->id === $music->user_id;
    }
    public function delete(User $user, Music $music)
    {
        return ($user->role === 'admin' || $user->role === 'manager') && $user->id === $music->user_id;
    }
}
