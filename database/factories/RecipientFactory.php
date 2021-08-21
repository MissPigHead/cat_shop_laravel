<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipient;
use Faker\Generator as Faker;

$factory->define(Recipient::class, function (Faker $faker) {
    return [
        'user_id'=> $faker->randomDigitNot(0),
        'name'=> $faker->name,
        'mobile_no'=> $faker->phoneNumber,
        'zip_code'=> $faker->postcode,
        'addr'=> $faker->address,
    ];
});
