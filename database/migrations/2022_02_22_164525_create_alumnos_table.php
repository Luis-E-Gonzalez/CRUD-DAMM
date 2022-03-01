<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->increments('id_alumno');
            $table->string('matricula',12);
            $table->string('nombre');
            $table->string('app');
            $table->string('apm');
            $table->set('gen',['Femenino','Masculino']);
            $table->date('fn');
            $table->text('foto');
            $table->integer('id_grupo');
            $table->text('email');
            $table->string('pass');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alumnos');
    }
}
