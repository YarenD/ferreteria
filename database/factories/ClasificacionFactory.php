<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clasificacion;
use Faker\Generator as Faker;

$factory->define(Clasificacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->unique()->word,
        'descripcion'=>$faker->text,
        'color'=>$faker->hexcolor,

        //
    ];
});
