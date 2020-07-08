<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportetiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportetipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->nullable();
            $table->unsignedDecimal('precio',9,2)->nullable();
            $table->unsignedDecimal('descuento',9,2)->nullable();
            $table->unsignedInteger('cant_descuento')->nullable();
            $table->unsignedDecimal('producto_precio',8,2)->nullable();
            $table->unsignedInteger('cantidad')->nullable();
            $table->unsignedDecimal('subtotal_bs',8,2)->nullable();
            $table->unsignedInteger('categoria_id')->nullable();
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
        Schema::dropIfExists('reportetipos');
    }
}
