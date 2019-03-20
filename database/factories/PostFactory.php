<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(rand(1, 4)),
        'slug' => $faker->unique()->slug,
        'category_id' =>$faker->randomDigitNotNull,
        'body' => $faker->paragraphs(rand(2, 10), true),
    ];
});
