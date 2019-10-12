<?php

namespace Modules\Comment\Services;

use Eloquent;
use Illuminate\Database\Eloquent\Collection;
use Modules\Comment\Models\Comment;
use Modules\Comment\Repositories\CommentRepository;

/**
 * Class CommentService
 *
 * @package \Modules\Api\Comment\Services
 */
class CommentService
{
    /**
     * @var CommentRepository
     */
    private $repository;

    /**
     * CommentService constructor.
     *
     * @param CommentRepository $repository
     */
    public function __construct(CommentRepository $repository)
    {
       $this->repository = $repository;
    }

    /**
     * @return Collection
     */
    public function getAllByCurrentUser()
    {
        return $this->repository->getAllByCurrentUser();
    }

    /**
     * Create a comment
     *
     * @param array $data
     *
     * @return Comment|Eloquent
     */
    public function create($data)
    {
        return $this->repository->create($data);
    }

}
