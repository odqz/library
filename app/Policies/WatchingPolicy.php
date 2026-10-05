<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Watching;

class WatchingPolicy
{
    /**
     * Determine whether the user can change/access models.
     */
    public function modify(User $user, Watching $watching): bool
    {
        return $watching->user->is($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }
}
