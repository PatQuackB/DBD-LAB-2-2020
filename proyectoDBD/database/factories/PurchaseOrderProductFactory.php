<?php

namespace Database\Factories;

use App\Models\PurchaseOrderProduct;
use App\Models\PurchaseOrder;
use App\Models\Product;
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
            //'idProducto'=>Product::factory()
            'idProducto' => Product::all()->random()->id,
            //'idOrdenCompra'=>PurchaseOrder::factory(),
            'idOrdenCompra' => PurchaseOrder::all()->random()->id
        ];
    }
}
