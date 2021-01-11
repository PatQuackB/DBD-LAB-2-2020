<?php

namespace Database\Factories;

use App\Models\PurchaseOrderProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseOrderProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Foranea
            'idOrdenCompra'=>PurchaseOrder::Factory,
            'idProducto'=>Product::Factory
        ];
    }
}
