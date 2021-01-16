<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_orders', function (Blueprint $table) {
            $table->id('id');

            $table->integer('estadoDespacho');
            $table->integer('tipoDespacho');
            $table->boolean('softDelete');
            //Foranea de Calle
            $table->unsignedBigInteger('idCalle')->nullable();
            $table->foreign('idCalle')->references('id')->on('street_addresses');

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
        Schema::dropIfExists('delivery_orders');
    }
}
