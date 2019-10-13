<?php

namespace Tests\Feature;

use Auth;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\User\Models\User;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Can only access app after authentication
     */
    public function test_can_access_app_only_after_authentication()
    {
        $response = $this->get('/');

        $response->assertStatus(302);

        /** @var User $user */
        $password = 'secret';

        $user = $this->createuser([
            'password' => Hash::make($password)
        ]);

       $this->post(route('auth.login'), [
            'email' => $user->email,
            'password' => $password
        ]);

       $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Every authenticated web request to app page generates a new user token
     */
    public function test_new_user_token_generation_at_every_web_authentication()
    {
        $user = $this->createUser();

        $token = $user->api_token;

        Auth::loginUsingId($user->id);

        $this->get('/');

        $user = $user->fresh();

        $this->assertNotEquals($user->api_token, $token);
    }

    /**
     * User token set to null after logout
     */
    public function test_user_token_set_to_null_after_logout()
    {
        $user = $this->createUser();

        Auth::loginUsingId($user->id);

        $this->get('/');

        $this->get(route('auth.logout'));

        $user = $user->fresh();

        $this->assertEquals(null, $user->api_token);
    }
}

