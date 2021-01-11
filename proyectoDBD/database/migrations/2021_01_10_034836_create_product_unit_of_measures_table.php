<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUnitOfMeasuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_unit_of_measures', function (Blueprint $table) {
            $table->id('id');

            #Foranea de Producto
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('products');

            #Foranea de Unidad de medida
            $table->unsignedBigInteger('idUnidadMedida');
            $table->foreign('idUnidadMedida')->references('id')->on('unit_of_measures');
            
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
        Schema::dropIfExists('product_unit_of_measures');
    }
}
