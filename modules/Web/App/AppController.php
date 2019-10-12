<?php

namespace Modules\Web\App;

use Illuminate\View\View;
use Modules\Auth\Services\AuthService;
use Modules\Core\Base\BaseController;

/**
 * Class AppController
 *
 * @package \Modules\Web\App
 */
class AppController extends BaseController
{
    /**
     * Show app
     *
     * @return View
     */
    public function showApp()
    {
        $token = app(AuthService::class)->generateNewToken();

       return view('app.index', compact('token'));
    }
}
