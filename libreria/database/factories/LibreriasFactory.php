<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Librerias;
use Faker\Generator as Faker;

$factory->define(Librerias::class, function (Faker $faker) {

    return [
        'li_rep_legal' => $faker->word,
        'li_ubicacion' => $faker->word,
        'li_nombre_libreria' => $faker->word,
        'li_correo' => $faker->word,
        'li_sitio_web' => $faker->word,
        'li_telefono' => $faker->word
    ];
});
