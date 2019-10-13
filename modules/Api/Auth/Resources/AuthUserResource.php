<?php

namespace Modules\Api\Auth\Resources;

use Illuminate\Http\Request;
use Modules\Core\Base\BaseJsonResource;
use Modules\Core\Settings;
use Modules\User\Models\User;

/**
 * Class AuthUserResource
 *
 * @property User $resource
 *
 * @package \Modules\Api\Auth\Resources
 */
class AuthUserResource extends BaseJsonResource
{
    /**
     * Build transformer
     *
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->formattedName(),
            'email' => $this->resource->email,
            'avatar_path' => url($this->resource->avatar_path),
            'joined_on' => $this->date($this->resource->created_at)
        ];
    }
}
