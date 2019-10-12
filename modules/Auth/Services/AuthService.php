<?php

namespace Modules\Auth\Services;

use Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Modules\User\Models\User;
use Str;

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

        $user = $this->getAuthenticatedUser();

        // renew authenticated user token for every successful login attempt
        $user->update([
            'api_token' => $this->generateToken()
        ]);

        return true;
    }

    /**
     * Log the authenticated user out
     */
    public function logout()
    {
        $user = $this->getAuthenticatedUser();

        if($user === null) {
            return;
        }

        Auth::logout();

        // Set user token to null after logout
        $user->update([
            'api_token' => null
        ]);
    }

    /**
     * Generate a unique token
     *
     * @return string
     */
    private function generateToken()
    {
        return hash('sha256', Str::random(60));
    }

    /**
     * @return Authenticatable|User
     */
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }
}
