<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_stalls', function (Blueprint $table) {
            $table->id('id');

            //Foranea de Usuario
            $table->unsignedBigInteger('idUsuario')->nullable();
            $table->foreign('idUsuario')->references('id')->on('users');

            //Foranea de Puesto
            $table->unsignedBigInteger('idPuesto')->nullable();
            $table->foreign('idPuesto')->references('id')->on('stalls');

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
        Schema::dropIfExists('user_stalls');
    }
}
