<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LibrosPrestados;
use Faker\Generator as Faker;

$factory->define(LibrosPrestados::class, function (Faker $faker) {

    return [
        'clie_id' => $faker->randomDigitNotNull,
        'lib_id' => $faker->randomDigitNotNull,
        'lp_fecha_inicio' => $faker->word,
        'lp_fecha_entrega' => $faker->word
    ];
});
