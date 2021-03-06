<?php

namespace Database\Factories;

use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreSubCategoria'=>$this->faker->name,
            'softDelete'=>$this->faker->randomElement($array = array (false)),

            //Foranea
            //'idCategoria'=>Category::factory()
            'idCategoria' => Category::all()->random()->id
        ];
    }
}
