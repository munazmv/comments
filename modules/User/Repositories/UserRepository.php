<?php

namespace Modules\User\Repositories;

use Eloquent;
use Modules\Core\BaseRepository;
use Modules\User\Models\User;

/**
 * Class UserRepository
 *
 * @package \Modules\User\Repositories
 */
class UserRepository extends BaseRepository
{

    /**
     * Get the repository model
     *
     * @return User
     */
    protected function model()
    {
        return new User;
    }
}
