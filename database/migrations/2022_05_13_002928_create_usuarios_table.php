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
            $table->string('domicilio')->nullable();
            $table->string('telefono')->nullable();
            $table->string('estadoCivil')->nullable();
            $table->date('nacimiento')->nullable();
            $table->string('nacionalidad')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado_m')->nullable();
            $table->string('postal')->nullable();
            $table->string('colonia')->nullable();
            $table->string('gradoMax')->nullable();
            $table->string('lvl_ingles')->nullable();
            $table->string('tipo_agremiado')->nullable();
            $table->string('titulo_grado')->nullable();
            $table->string('grado_estado')->nullable();
            $table->string('vigencia_certificado')->nullable();
            $table->string('Nempleado')->nullable();
            $table->string('carrera')->nullable();
            $table->string('puestoA')->nullable();
            $table->string('puestoD')->nullable();
            $table->string('departamento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_afiliacion')->nullable();
            $table->string('ine')->nullable();
            $table->string('curp')->nullable();
            $table->string('rfc')->nullable();
            $table->string('nombreP')->nullable();
            $table->string('parentesco')->nullable();
            $table->string('telContacto')->nullable();
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
