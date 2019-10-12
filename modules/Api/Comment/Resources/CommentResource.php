<?php

namespace Modules\Api\Comment\Resources;

use Modules\Comment\Models\Comment;
use Modules\Core\Base\BaseJsonResource;

/**
 * Class CommentResource
 *
 * @property Comment $resource
 *
 * @package \Modules\Api\Comment\Resources
 */
class CommentResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'content' => $this->resource->content,
            'posted_on' => [
                'date' => $this->date($this->resource->created_at),
                'diff' => $this->dateDiff($this->resource->created_at)
            ]
        ];
    }
}
