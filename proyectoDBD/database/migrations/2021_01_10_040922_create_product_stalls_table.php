<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stalls', function (Blueprint $table) {
            $table->id('id');

            //Foranea de Producto
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('products');

            //Foranea de Puesto
            $table->unsignedBigInteger('idPuesto');
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
        Schema::dropIfExists('product_stalls');
    }
}
