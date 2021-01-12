<?php

namespace Database\Factories;

use App\Models\ProductUnitOfMeasure;
use App\Models\Product;
use App\Models\UnitOfMeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductUnitOfMeasureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductUnitOfMeasure::class;

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
            'idUnidadMedida'=>UnitOfMeasure::factory()
        ];
    }
}
