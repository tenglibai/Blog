<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $user_ids = \App\User::pluck('id')->toArray();
    $discussion_ids = \App\Discussion::pluck('id')->toArray();
    return [
        'body' => $faker->paragraph,
        'user_id' => $faker->randomElement($user_ids),
        'discussion_id' => $faker->randomElement($discussion_ids),
    ];
});
