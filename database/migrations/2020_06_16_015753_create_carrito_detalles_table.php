<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarritoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_detalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carrito_id');
            $table->unsignedBigInteger('producto_id');
            $table->unsignedInteger('cantidad');
            $table->text('especificacion')->nullable();
            $table->float('producto_precio',8,2);
            $table->float('descuento_pro',8,2)->nullable();
            $table->float('subtotal_bs',8,2);

            $table->foreign('producto_id')->references('id')->on('productos');
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
        Schema::dropIfExists('carrito_detalles');
    }
}
