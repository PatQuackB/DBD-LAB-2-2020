<?php

namespace Database\Factories;

use App\Models\ProductStall;
use App\Models\Product;
use App\Models\Stall;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductStallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductStall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Foranea
            'idProducto'=>Product::factory(),
            'idPuesto'=>Stall::factory()
        ];
    }
}
