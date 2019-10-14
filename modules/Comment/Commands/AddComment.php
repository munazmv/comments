<?php

namespace Modules\Comment\Commands;

use Illuminate\Console\Command;
use Modules\Comment\Services\CommentService;
use Modules\User\Repositories\UserService;

class AddComment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comment:add 
    {email : The email of the user}
    {comment : The comment to be added}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a comment for user.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->argument('email');
        $comment = $this->argument('comment');

        $user = app(UserService::class)->findByEmailOrNull($email);

        if($user === null) {
            $this->error("No user found under the email [{$email}]");
        }

        $data = [
            'user_id' => $user->id,
            'content' => $comment
        ];

        app(CommentService::class)->create($data);

        $this->info("New comment added to user {$user->formattedName()} - {$user->email}");
    }
}
