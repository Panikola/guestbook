<?php

use Faker\Generator as Faker;

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'body' => $faker->sentence,
    ];
});
