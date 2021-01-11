<?php

namespace Database\Factories;

use App\Models\ProductUnitOfMeasure;
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
            'idProducto'=>Product::Factory,
            'idUnidadMedida'=>UnitOfMeasure::Factory
        ];
    }
}
