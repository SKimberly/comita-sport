<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            //$table->foreign('user_id')->references('id')->on('users');
            $table->string('envia');
            $table->string('recibe');
            $table->text('contenido');

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
        Schema::dropIfExists('mensajes');
    }
}

