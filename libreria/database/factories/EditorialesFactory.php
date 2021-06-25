<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Editoriales;
use Faker\Generator as Faker;

$factory->define(Editoriales::class, function (Faker $faker) {

    return [
        'aut_id' => $faker->randomDigitNotNull,
        'edi_nombre_empresa' => $faker->word,
        'edi_telefono' => $faker->word,
        'edi_direccion' => $faker->word,
        'edi_correo' => $faker->word
    ];
});
