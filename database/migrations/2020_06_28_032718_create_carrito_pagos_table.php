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
            $table->string('imagen');
            $table->unsignedInteger('monto');
            $table->timestamp('fecha');
            $table->text('descripcion')->nullable();
            $table->boolean('estado')->default(false);
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
