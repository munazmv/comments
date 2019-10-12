<?php

namespace Modules\Auth\Services;

use Auth;

/**
 * Class AuthService
 *
 * @package \Modules\Auth\Services
 */
class AuthService
{
    /**
     * Attempt login
     *
     * @param string $email
     * @param string $password
     *
     * @return bool
     */
    public function attemptLogin($email, $password)
    {
        if(!Auth::attempt(compact('email', 'password'))) {
           return false;
        }

        return true;
    }
}
