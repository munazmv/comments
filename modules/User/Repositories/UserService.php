<?php

namespace Modules\User\Repositories;

use Eloquent;
use Modules\User\Models\User;

/**
 * Class UserService
 *
 * @package \Modules\User\Repositories
 */
class UserService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserService constructor.
     *
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Find user by email or null
     *
     * @param string $email
     *
     * @return User|Eloquent
     */
    public function findByEmailOrNull($email)
    {
        return $this->repository->findByOrNull('email', $email);
    }
}
