<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Xdl;
use Faker\Generator as Faker;

$factory->define(Xdl::class, function (Faker $faker) {
    return [
        //
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'published_at' => \Carbon\Carbon::now(),
        'author_id' => \App\User::all()->random()->id
    ];
});
