<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\ProductoFoto;
use Faker\Generator as Faker;

$factory->define(ProductoFoto::class, function (Faker $faker) {
    return [
        'imagen' => $faker->imageUrl(250,250),
    	'producto_id' =>$faker->numberBetween(1,10)
    ];
});
