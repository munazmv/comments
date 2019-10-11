<?php

namespace Modules\Core\Base;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

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
}
