<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Autores;
use Faker\Generator as Faker;

$factory->define(Autores::class, function (Faker $faker) {

    return [
        'aut_nombres' => $faker->word,
        'aut_apellidos' => $faker->word,
        'aut_edicion' => $faker->word,
        'aut_biografia' => $faker->word,
        'aut_ibras' => $faker->word
    ];
});
