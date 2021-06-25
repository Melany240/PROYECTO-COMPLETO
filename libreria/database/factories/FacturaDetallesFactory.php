<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FacturaDetalles;
use Faker\Generator as Faker;

$factory->define(FacturaDetalles::class, function (Faker $faker) {

    return [
        'fac_id' => $faker->randomDigitNotNull,
        'fac_tipo_pago' => $faker->word,
        'fac_descripcion' => $faker->word,
        'fac_iva' => $faker->randomDigitNotNull,
        'fac_descuento' => $faker->randomDigitNotNull,
        'fac_valor_total' => $faker->randomDigitNotNull
    ];
});
