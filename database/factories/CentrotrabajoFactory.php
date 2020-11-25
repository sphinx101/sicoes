<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;

$factory->define(App\Models\Centrotrabajo::class, function (Faker $faker) {
    return [
        'cct'      => $faker->unique()->postcode,
        'nombre'   => $faker->unique()->city
    ];
});
