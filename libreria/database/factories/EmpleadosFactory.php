<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empleados;
use Faker\Generator as Faker;

$factory->define(Empleados::class, function (Faker $faker) {

    return [
        'li_id' => $faker->randomDigitNotNull,
        'emp_nombres' => $faker->word,
        'emp_apellidos' => $faker->word,
        'emp_cedula' => $faker->word,
        'emp_direccion' => $faker->word,
        'emp_telefono' => $faker->word,
        'emp_correo' => $faker->word
    ];
});
