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
    public function generateNewToken()
    {
        $user = $this->getAuthenticatedUser();
        $token = Str::random(60);

        $user->update([
            'api_token' => hash('sha256', $token)
        ]);

        return $token;
    }

    /**
     * @return Authenticatable|User
     */
    public function getAuthenticatedUser()
    {
        return Auth::user();
    }
}
