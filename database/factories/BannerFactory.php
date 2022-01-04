<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
        'text' => $faker->realText(10),
        'image_path' => $faker->imageUrl(640, 480),
        'show' => $faker->boolean($chanceOfGettingTrue = 80),
        'created_at' => "2020-06-20 19:12:54",
        'updated_at' => $faker->dateTimeThisYear('2022-06-30', 'Asia/Taipei'),
    ];
});
