<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Facturas;
use Faker\Generator as Faker;

$factory->define(Facturas::class, function (Faker $faker) {

    return [
        'li_id' => $faker->randomDigitNotNull,
        'clie_id' => $faker->randomDigitNotNull,
        'lib_id' => $faker->randomDigitNotNull,
        'fac_numero' => $faker->randomDigitNotNull,
        'fac_fecha' => $faker->word
    ];
});
