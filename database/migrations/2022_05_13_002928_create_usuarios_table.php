<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('nacimiento')->nullable();
            $table->string('colonia')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('gradoMax')->nullable();
            $table->string('domicilio')->nullable();
            $table->string('nombreP')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('telContacto')->nullable();
            $table->string('puesto')->nullable();
            $table->string('carrera')->nullable();
            $table->string('departamento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_afiliacion')->nullable();
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->string('ine')->nullable();
            $table->integer('estado');
            $table->integer('is_admin');
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
        Schema::dropIfExists('usuarios');
    }
}
