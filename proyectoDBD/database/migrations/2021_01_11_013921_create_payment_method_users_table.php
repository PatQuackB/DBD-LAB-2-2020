<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_method_users', function (Blueprint $table) {
            $table->id('id');

            #Foranea de OrdenDespacho
            $table->unsignedBigInteger('idPago');
            $table->foreign('idPago')->references('id')->on('payment_methods');

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
        Schema::dropIfExists('payment_method_users');
    }
}
