<?php

namespace App\Policies;

use App\Models\Reading;
use App\Models\User;

class ReadingPolicy
{
    /**
     * Determine whether the user can change/access models.
     */
    public function modify(User $user, Reading $reading): bool
    {
        return $reading->user->is($user);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }
}
