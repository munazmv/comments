<?php

namespace Modules\Core\Base;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\JsonResponse;
use Modules\Auth\Services\AuthService;
use Modules\User\Models\User;

/**
 * Class BaseController
 *
 * @package \Modules\Core\Base
 */
class BaseController extends Controller
{
    /**
     * Respond Ok for api
     *
     * @return JsonResponse
     */
    public function respondApiOk()
    {
        return response()->json('ok');
    }

    /**
     * @return User
     */
    public function user()
    {
        return app(AuthService::class)->getAuthenticatedUser();
    }

    public function userToken()
    {
        $user = $this->user();

        return $user->api_token;
    }
}
