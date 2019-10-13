<?php

use Illuminate\Database\Seeder;
use Modules\User\Models\Comment;
use Modules\User\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'email' => 'munaz7762650@gmail.com',
            'avatar_path' => '/storage/avatars/default.png'
        ]);
        factory(Comment::class, 5)->create();
    }
}
