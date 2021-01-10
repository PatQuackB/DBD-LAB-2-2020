<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id('id');
            $table->integer('estadoPago');
            $table->integer('tipoTarjeta');
            $table->string('nombreBanco');
            $table->string('ultimosNumerosTarjeta');
            $table->integer('mesVencimiento');
            $table->integer('anioVencimiento');

            #Foranea de OrdenDespacho
            $table->unsignedBigInteger('idDespacho');
            $table->foreign('idDespacho')->references('id')->on('delivery_orders');

            #Foranea de Usuario
            $table->unsignedBigInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');

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
        Schema::dropIfExists('payment_methods');
    }
}
