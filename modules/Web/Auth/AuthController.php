<?php

namespace Modules\Web\Auth;

use Illuminate\View\View;
use Modules\Auth\Services\AuthService;
use Modules\Core\Base\BaseController;
use Modules\Web\Auth\Requests\AttemptLoginRequest;

/**
 * Class AuthController
 *
 * @package \Modules\Web\Auth
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
     * Show login page
     *
     * @return View
     */
    public function showLogin()
    {
        return view('auth/login');
    }

    public function attemptLogin(AttemptLoginRequest $request)
    {
        $success = $this->authService->attemptLogin($request->email, $request->password);

        if(!$success) {
            return redirect()->back()->with('error', "Username or password incorrect!");
        }
    }
}
