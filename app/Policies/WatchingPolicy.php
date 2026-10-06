<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Watching;
use Illuminate\Support\Facades\Auth;

class WatchingPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can change/access models.
     */
    public function modify(User $user, Watching $watching): bool
    {
        return $watching->user->is($user);
    }
}
