<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    /**
     * Check if user is admin.
     *
     * @param $authenticatedUser
     * @return bool
     */
    public function before($authenticatedUser)
    {
        if ($authenticatedUser->is_admin) {
            return true;
        }
    }
}
