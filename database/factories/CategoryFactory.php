<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'title'=>$faker->text(10),
        'parent'=>rand(1,4),
        'show'=>$faker->boolean($chanceOfGettingTrue = 80),
        'created_at' => "2020-06-20 19:12:54",
        'updated_at' => $faker->dateTimeThisYear('2021-06-30','Asia/Taipei'),
    ];
});
