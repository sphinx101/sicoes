<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Docente;
use Faker\Generator as Faker;

$factory->define(App\Models\Aula::class, function (Faker $faker) {
    $docentes = Docente::whereHas('user', function ($query) {
        return $query->where('type', 'docente');
    })->where('centrotrabajo_id', '1')->pluck('id');
    return [
        'docente_id'        => $faker->randomElement($docentes),
        'turno_id'          =>  $faker->randomElement($array = array(1, 2, 3)),
        'grupo_id'          => rand(1, 11),
        'grado_id'          => $faker->randomElement($array = array(1, 2, 3)),
        'cicloescolar_id'   => 1
    ];
});
