<?php

use Faker\Generator as Faker;

$factory->define(App\Discussion::class, function (Faker $faker) {
    $user_ids = \App\User::pluck('id')->toArray();
    return [
        'title' => $faker->sentence,
        'body'=>$faker->paragraph,
        'user_id'=>$faker->randomElement($user_ids),
        'last_user_id'=>$faker->randomElement($user_ids),
    ];
});
