<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Libros;
use Faker\Generator as Faker;

$factory->define(Libros::class, function (Faker $faker) {

    return [
        'li_id' => $faker->randomDigitNotNull,
        'edi_id' => $faker->randomDigitNotNull,
        'lib_autores_' => $faker->word,
        'lib_nombres_libros' => $faker->word,
        'lib_ano' => $faker->word,
        'lib_categoria' => $faker->word,
        'lib_editorial_' => $faker->word,
        'lib_clasificacion_' => $faker->word
    ];
});
