<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Producto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Producto::class, function (Faker $faker) {
	$nombre = substr($faker->sentence(3),0,-1);
	$slug = Str::of($nombre)->slug('-');
    return [
        'nombre' => $nombre,
        'slug' => $slug,
    	'descripcion' => $faker->text,
    	'precio' => $faker->randomFloat(0,5,150),
    	'descuento' => $faker->randomFloat(0,2,150),
    	'oferta' => $faker->randomFloat(0,3,150),
    	'stock' => $faker->numberBetween(10,500),
    	'estado' => $faker->numberBetween(0,1),
    	'categoria_id' => $faker->numberBetween(1,5)
    ];
});