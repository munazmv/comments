<?php

namespace Modules\Api\Comment\Requests;

use Modules\Core\Base\BaseRequest;

/**
 * Class CreateCommentRequest
 *
 * @property string $comment
 *
 * @package \Modules\Api\Comment\Requests
 */
class CreateCommentRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'comment' => 'required|string'
        ];
    }
}
