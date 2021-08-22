<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Recipient;
use Faker\Generator as Faker;

$factory->define(Recipient::class, function (Faker $faker) {
    return [
        'user_id'=> rand(1, 10),
        'name'=> $faker->name,
        'phone_no'=> $faker->phoneNumber,
        'postcode'=> $faker->postcode,
        'addr'=> $faker->address,
    ];
});
