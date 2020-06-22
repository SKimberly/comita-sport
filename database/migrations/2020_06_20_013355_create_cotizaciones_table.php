<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotizacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('codigo')->unique()->nullable();
            $table->unsignedInteger('cantidad')->nullable();
            $table->timestamp('fecha')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedDecimal('descuento',9,2)->nullable();
            $table->unsignedDecimal('precio',9,2)->nullable();
            $table->string('estado')->default('Activo');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('cotizaciones');
    }
}
