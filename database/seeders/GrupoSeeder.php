<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        DB::table("grupos")->insert(
            [
                'clave'  => 'DSM-51',
                'nombre' => 'TIC.TSU-Desarrollo de Software Multiplataforma, Grupo 51',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table("grupos")->insert(
            [
                'clave'  => 'DSM-52',
                'nombre' => 'TIC.TSU-Desarrollo de Software Multiplataforma, Grupo 52',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table("grupos")->insert(
            [
                'clave'  => 'DSM-53',
                'nombre' => 'TIC.TSU-Desarrollo de Software Multiplataforma, Grupo 53',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        DB::table("grupos")->insert(
            [
                'clave'  => 'DSM-54',
                'nombre' => 'TIC.TSU-Desarrollo de Software Multiplataforma, Grupo 54',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}
