<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialEstacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_estaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('estacion')->unsigned();
            $table->string('comentario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_estaciones');
    }
}
