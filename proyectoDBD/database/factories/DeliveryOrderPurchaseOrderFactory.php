<?php

namespace Database\Factories;

use App\Models\DeliveryOrderPurchaseOrder;
use App\Models\DeliveryOrder;
use App\Models\PurchaseOrder;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryOrderPurchaseOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryOrderPurchaseOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Intermedia
            //'idDespacho'=>DeliveryOrder::factory(),
            'idDespacho' => DeliveryOrder::all()->random()->id,
            //'idOrdenCompra'=>PurchaseOrder::factory()
            'idOrdenCompra' => PurchaseOrder::all()->random()->id
        ];
    }
}
