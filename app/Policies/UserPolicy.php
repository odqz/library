<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Determine whether the user can modify any models.
     */
    public function modify(User $user, User $targetUser): bool
    {
        return $user->is($targetUser);
    }
}
