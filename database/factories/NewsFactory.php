<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(rand(10, 15)),
        'article' => $faker->realText(rand(100, 300)),
        'image_path' => $faker->imageUrl(640, 480),
        'show' => $faker->boolean($chanceOfGettingTrue = 90),
        'created_at' => "2020-06-20 19:12:54",
        'updated_at' => $faker->dateTimeThisYear('2021-06-30', 'Asia/Taipei'),
    ];
});
