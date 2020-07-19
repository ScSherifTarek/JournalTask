<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return factory(User::class)->raw();
});
