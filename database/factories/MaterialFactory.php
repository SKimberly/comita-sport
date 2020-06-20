<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Material;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Material::class, function (Faker $faker) {

    $nombre = $faker->unique()->sentence(1);
	$slug = Str::of($nombre)->slug('-');
    return [
        'nombre' => $nombre,//ucfirst($faker->unique()->word),
        'slug' => $slug,
        'descripcion' => ucfirst($faker->sentence(10))
   	];
});
