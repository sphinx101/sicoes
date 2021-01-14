<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 'docentes', 500)->create()->each(function ($user) {
            $rol = App\Models\Role::where('name', $user->type)->get();

            $faker = Faker\Factory::create('es_ES');
            $user->attachRole($rol[0]);
            $user->docente()->create([
                'centrotrabajo_id' => $faker->randomElement($array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)),
                'rfc'       => $faker->unique()->isbn13,
                'curp'      => $faker->unique()->isbn13 . '1a2a3',
                'nombre'    => $faker->name,
                'appaterno' => $faker->lastName,
                'apmaterno' => $faker->lastName,
                'domicilio' => $faker->address,
                'localidad' => $faker->city,
                'municipio' => $faker->cityPrefix,
                'estado'    => $faker->state,
                'telefono'  => $faker->phoneNumber,
                'celular'   => $faker->phoneNumber
            ]);
        });

        /*factory(App\User::class, 'alumnos', 200)->create()->each(function ($user) {
            $rol = App\Models\Role::where('name', $user->type)->get();

            $faker = Faker\Factory::create('es_ES');
            $user->attachRole($rol[0]);
            $user->alumno()->create([
                'centrotrabajo_id' => $faker->randomElement($array = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)),

                'curp'      => $faker->unique()->isbn13 . '1a2a3',
                'nombre'    => $faker->name,
                'appaterno' => $faker->lastName,
                'apmaterno' => $faker->lastName,
                'domicilio' => $faker->address,
                'localidad' => $faker->city,
                'municipio' => $faker->cityPrefix,

            ]);
        });*/
    }
}
