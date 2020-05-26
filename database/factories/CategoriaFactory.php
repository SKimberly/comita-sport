<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categoria;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Categoria::class, function (Faker $faker) {
	$nombre = ucfirst($faker->unique()->word);
	$slug = Str::of($nombre)->slug('-');
    return [
        'nombre' => $nombre,//ucfirst($faker->unique()->word),
        'slug' => $slug,
        'descripcion' => ucfirst($faker->sentence(10)),
        'imagen' => $faker->imageUrl(250,250)
    ];
});
