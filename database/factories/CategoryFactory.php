<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(rand(1, 3)),
        'slug' => $faker->slug()
    ];
});