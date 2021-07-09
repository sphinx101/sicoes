<?php

use App\Models\Alumno;
use App\Models\Aula;
use Illuminate\Database\Seeder;

class AulasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Aula::class, 990)->create()->each(function ($aula) {

            $aula_attach_alumno = Aula::find(random_int(Aula::first()->id, $aula->id));
            $alumno = Alumno::where('centrotrabajo_id', '1')->pluck('id');
            $faker = Faker\Factory::create('es_ES');
            $aula_attach_alumno->alumnos()->attach($faker->randomElement($alumno)); //inscripcion
        });
    }
}
