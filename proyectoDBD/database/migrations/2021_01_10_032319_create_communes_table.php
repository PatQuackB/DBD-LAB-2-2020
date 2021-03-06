<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communes', function (Blueprint $table) {
            $table->id('id');

            $table->string('nombreComuna');
            $table->boolean('softDelete'); 

            //Foranea de Region
            $table->unsignedBigInteger('idRegion')->nullable();//AQUI SE AGREGO UN NULLABLE PARA REALIZAR PRUEBAS DE STORE EN POSTMAN
            $table->foreign('idRegion')->references('id')->on('regions');
            
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
        Schema::dropIfExists('communes');
    }
}
