<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNumberAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('number_addresses', function (Blueprint $table) {
            $table->id('id');

            $table->string('numeroCalle');
            $table->boolean('softDelete');
            
            //Foranea de Comuna
            $table->unsignedBigInteger('idComuna');
            $table->foreign('idComuna')->references('id')->on('communes');

            //Foranea de CalleDireccion
            $table->unsignedBigInteger('idCalle');
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
        Schema::dropIfExists('number_addresses');
    }
}
