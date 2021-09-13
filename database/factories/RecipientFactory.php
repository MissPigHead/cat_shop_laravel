<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipient;
use Faker\Generator as Faker;

$factory->define(Recipient::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 10),
        'name' => $faker->name,
        'phone_no' => '0' . $faker->numberBetween(900000000, 999999999),
        'postcode' => rand(1, 368),
        'addr' => $faker->streetAddress,
    ];
});
