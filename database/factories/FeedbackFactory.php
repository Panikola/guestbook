<?php

use Faker\Generator as Faker;

$factory->define(App\Feedback::class, function (Faker $faker) {
    return [
      'name' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'body' => $faker->sentence
    ];
});
//factory(App\Feedback::class, 10)->create()->each(function ($u){$u->replies()->save(factory(App\Reply::class)->make());})