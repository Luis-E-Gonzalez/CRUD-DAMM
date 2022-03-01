<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AlumnoSeeder extends Seeder
{
    public function run(){
        $faker = Faker::create();
        for ($i=0; $i < 16; $i++) {
              DB::table("alumnos")->insert(
                    array(
                          'matricula'  => $faker->unique()->randomNumber(9),
                          'nombre'     => $faker->firstname,
                          'app'  => $faker->lastName,
                          'apm'  => $faker->lastName,
                          'gen' => 'Masculino',
                          'fn' => date('Y-m-d H:m:s'),
                          'foto' => 'uno.png',
                          'id_grupo' => 3,
                          'email' => $faker->unique()->safeEmail,
                          'pass'=> $faker->password,
                          'created_at'=>now(),
                          'updated_at'=>now(),
                    )
              );
        }
  }
}
