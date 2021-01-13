<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order_products', function (Blueprint $table) {
            $table->id('id');

            //Foranea de Orden De Compra
            $table->unsignedBigInteger('idOrdenCompra');
            $table->foreign('idOrdenCompra')->references('id')->on('purchase_orders');

            //Foranea de Producto
            $table->unsignedBigInteger('idProducto');
            $table->foreign('idProducto')->references('id')->on('products');
            
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
        Schema::dropIfExists('purchase_order_products');
    }
}
