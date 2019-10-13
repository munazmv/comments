<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Modules\User\Models\User;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Create a dummy user
     *
     * @param array $overrides
     *
     * @return User
     */
    protected function createUser($overrides = [])
    {
        return factory(User::class)->create($overrides);
    }
}
