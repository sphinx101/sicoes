<?php

use Illuminate\Database\Seeder;

class CentrotrabajoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Centrotrabajo::class, 10)->create();
    }
}
