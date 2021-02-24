<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'sku' => $faker->unique()->word,
        'nombre'=>$faker->word,
        'descripcion'=>$faker->text(200),
        'unidad_medida'=>$faker->word,
        'precio'=>$faker->randomFloat(2,0,1000),
        'clasificacion_id'=>$faker->numberBetween(1,4)
    ];
});
