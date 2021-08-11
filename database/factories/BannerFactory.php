<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {
    return [
      'text'=>$faker->word(3),
      'image_path'=>"image/Banner0".rand(1,2).".jpg",
      'show'=>$faker->boolean($chanceOfGettingTrue = 80),
      'created_at' => "2020-06-20 19:12:54",
      'updated_at' => $faker->dateTimeThisYear('2021-06-30','Asia/Taipei'),
    ];
});
