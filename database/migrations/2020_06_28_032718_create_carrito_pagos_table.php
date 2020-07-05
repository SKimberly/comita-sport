<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoPagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_pagos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('usuario');
            $table->string('imagen')->nullable();
            $table->unsignedInteger('monto')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('estado')->nullable();
            $table->string('respuesta')->nullable();
            $table->unsignedBigInteger('carrito_id');
            $table->foreign('carrito_id')->references('id')->on('carritos');
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
        Schema::dropIfExists('carrito_pagos');
    }
}
