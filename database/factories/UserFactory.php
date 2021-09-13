<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$/8h.BL0MDrFDE7cMdsWahuZsOnlwwi/BfFO5bXs15m3OGlBRI/pwm',
        'birthday' => $faker->date('Y-m-d', '2014-12-31'),
        'phone_no' => '0' . $faker->numberBetween(900000000, 999999999),
        'created_at' => $faker->dateTimeThisYear('2021-06-30', 'Asia/Taipei'),
        'status' => $faker->boolean($chanceOfGettingTrue = 95),
    ];
});
