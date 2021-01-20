<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeribarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deribars', function (Blueprint $table) {
            $table->id();
            $table->integer('id_equipo');
            $table->integer('id_cliente');
            $table->integer('id_persona');
            $table->integer('id_atendio');
            $table->integer('id_atendera');
            $table->text('obs');
            $table->string('atendido',1);
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
        Schema::dropIfExists('deribars');
    }
}
