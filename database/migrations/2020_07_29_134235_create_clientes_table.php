<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_equipo');
            $table->integer('id_usuario');
            $table->integer('id_persona');
            $table->integer('id_comunicacion');
            $table->string('edad',3);
            $table->string('estadocivil',100);
            $table->string('nacionalidad',50);
            $table->string('religion',50);
            $table->string('carrera',100);
            $table->string('grado',100);
            $table->text('nucleofamiliar');
            $table->text('significativafamiliar');
            $table->text('extrafomiliar');
            $table->text('predida');
            $table->text('miedo');
            $table->text('percepcion');
            $table->text('motivo');
            $table->string('enfermedad',100);
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
        Schema::dropIfExists('clientes');
    }
}
