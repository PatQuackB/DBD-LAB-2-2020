<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryOrderPurchaseOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_order_purchase_orders', function (Blueprint $table) {
            $table->id('id');

            //Foranea de Orden De Compra
            $table->unsignedBigInteger('idOrdenCompra')->nullable();
            $table->foreign('idOrdenCompra')->references('id')->on('purchase_orders');

            //Foranea de Orden De Despacho
            $table->unsignedBigInteger('idDespacho')->nullable();
            $table->foreign('idDespacho')->references('id')->on('delivery_orders');

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
        Schema::dropIfExists('delivery_order_purchase_orders');
    }
}
