<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotiPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coti_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('usuario');
            $table->string('imagen');
            $table->unsignedInteger('monto');
            $table->timestamp('fecha');
            $table->text('descripcion')->nullable();
            $table->string('estado')->nullable();
            $table->string('respuesta')->nullable();
            $table->unsignedBigInteger('cotizacion_id');
            $table->foreign('cotizacion_id')->references('id')->on('cotizaciones');
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
        Schema::dropIfExists('coti_pagos');
    }
}
