<?php

namespace Modules\Api\Comment;

use Modules\Api\Comment\Requests\CreateCommentRequest;
use Modules\Api\Comment\Resources\CommentResource;
use Modules\Comment\Services\CommentService;
use Modules\Core\Base\BaseController;

/**
 * Class CommentController
 *
 * @package \Modules\Api\Comment
 */
class CommentController extends BaseController
{
    /**
     * @var CommentService
     */
    private $commentService;

    /**
     * CommentController constructor.
     *
     * @param CommentService $commentService
     */
    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Get all comments
     */
    public function all()
    {
        $comments = $this->commentService->getAllByCurrentUser();

        return CommentResource::collection($comments);
    }

    /**
     * Create a new comment
     *
     * @param CreateCommentRequest $request
     *
     * @return CommentResource
     */
    public function store(CreateCommentRequest $request)
    {
        $data = [
            'user_id' => $this->user()->id,
            'content' => $request->comment
        ];

        $comment = $this->commentService->create($data);

        return new CommentResource($comment);
    }

}
