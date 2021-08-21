<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(5,10),
        'unit_id' => rand(1,3),
        'name' => $faker->company, // $faker->word, $faker->words(), $faker->sentence, $faker->paragraph, $faker->text 都給不支援中文...
        'price' => rand(3, 200)*10,
        'image_path' => [$faker->imageUrl, $faker->imageUrl],
        'specification' => $faker->realText(rand(10,12)),
        'description' => $faker->realText(rand(100,200)),
        'in_stock' => rand(0, 200),
        'show' => $faker->boolean($chanceOfGettingTrue = 90),
        'created_at' => "2020-06-20 19:12:54",
        'updated_at' => $faker->dateTimeThisYear('2021-06-30','Asia/Taipei'),
    ];
});
