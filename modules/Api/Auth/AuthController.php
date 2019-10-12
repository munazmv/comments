<?php

namespace Modules\Api\Auth;

use Modules\Api\Auth\Resources\AuthUserResource;
use Modules\Auth\Services\AuthService;
use Modules\Core\Base\BaseController;

/**
 * Class AuthController
 *
 * @package \Modules\Api\Auth
 */
class AuthController extends BaseController
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     *
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Get authenticated user
     *
     * @return AuthUserResource
     */
    public function getUser()
    {
        $user = $this->user();

        return new AuthUserResource($user);
    }
}
