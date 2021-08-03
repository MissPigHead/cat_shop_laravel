<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title'=>$faker->realText(rand(10,20)),
        'article'=>$faker->realText(rand(100,300)),
        'show'=>$faker->boolean($chanceOfGettingTrue = 90),
        'image_path'=>"/image/news001.jpg",
        // 'created_at' => date('Y-m-d Hs',time()),
    ];
});
