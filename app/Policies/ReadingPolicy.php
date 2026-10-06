<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reading;
use Illuminate\Support\Facades\Auth;

class ReadingPolicy
{
    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return Auth::check();
    }

    /**
     * Determine whether the user can modify models.
     */
    public function modify(User $user, Reading $reading): bool
    {
        return $reading->user->is($user);
    }
}
