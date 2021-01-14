<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stalls', function (Blueprint $table) {
            $table->id('id');

            $table->string('nombrePuesto');
            $table->boolean('softDelete');
            //Foranea de Feria
            $table->unsignedBigInteger('idFeria');
            $table->foreign('idFeria')->references('id')->on('fairs');

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
        Schema::dropIfExists('stalls');
    }
}
