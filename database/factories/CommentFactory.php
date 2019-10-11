<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\User\Models\Comment;
use Modules\User\Models\User;

$factory->define(Comment::class, function (Faker $faker) {

    $users = User::all();

    return [
        'user_id' => $users->shuffle()->first()->id,
        'content' => $faker->paragraph(2)
    ];
});
