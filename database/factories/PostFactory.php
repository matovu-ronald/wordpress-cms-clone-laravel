<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Faker\Provider\tr_TR\DateTime;



$factory->define(App\Post::class, function( Faker $faker ) {
    return [
        'author_id' => function () {
            if (rand(1, 10) % 5 == 0) {
                return factory(App\User::class)->create()->id;
            } else {
                return rand(1, 5);
            }
        },
        'title' => $faker->sentence(rand(8, 12)),
        'excerpt' => $faker->text(rand(250, 300)),
        'body' => $faker->paragraphs(rand(10, 15), true),
        'slug' => $faker->slug(),
        'image' => function () {
            return rand(0, 1) == 1 ? ('Post_Image_' . rand(1, 5) . '.jpg') : NULL;
        },
        'created_at' => Carbon::now()->subDays(rand(1, 60)),
        'updated_at' => Carbon::now()->subDays(rand(1, 60)),
        'published_at' => rand(0, 1) == 1 ?  Carbon::now()->subDays(rand(1, 60)) : NULL
    ];
});
