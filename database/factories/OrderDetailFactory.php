<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderDetail;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    $p_id = rand(1, 50);
    $price = Product::find($p_id)->price;
    $q = rand(1, 5);

    return [
        'product_id' => $p_id,
        'quantity' => $q,
        'price' => $price,
        'amount' => $q * $price,
    ];
});
