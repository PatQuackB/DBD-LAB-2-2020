<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreProducto'=>$this->faker->name,
            'precioProducto'=>$this->faker->numberBetween($min=1000,$max=20000),
            'stockProducto'=>$this->faker->randomNumber($nbDigits = 4, $strict = false),

            //Foranea
            //'idCategoria'=>Category::factory()
            'idCategoria' => Category::all()->random()->id
        ];
    }
}
