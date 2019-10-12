<?php

namespace Modules\Core\Base;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Core\Settings;

/**
 * Class BaseJsonResource
 *
 * @package \Modules\Core\Base
 */
class BaseJsonResource extends JsonResource
{
    /**
     * Build date response
     *
     * @param Carbon|null $date
     *
     * @return string
     */
    protected function date(Carbon $date = null)
    {
        if($date === null) {
            return '';
        }

        return $date->format(Settings::DEFAULT_DATE_FORMAT);
    }
}
