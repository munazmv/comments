<?php

namespace Modules\Comment\Repositories;

use Eloquent;
use Modules\Comment\Models\Comment;
use Modules\Core\BaseRepository;

/**
 * Class CommentRepository
 *
 * @package \Modules\Api\Comment\Repositories
 */
class CommentRepository extends BaseRepository
{
    /**
     * Get the repository model
     *
     * @return Eloquent
     */
    protected function model()
    {
        return new Comment;
    }


}
