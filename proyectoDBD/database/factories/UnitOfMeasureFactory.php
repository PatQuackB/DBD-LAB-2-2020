<?php

namespace Database\Factories;

use App\Models\UnitOfMeasure;
use Illuminate\Database\Eloquent\Factories\Factory;

class UnitOfMeasureFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UnitOfMeasure::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'nombreUnidadMedida'=>$this->faker->name,

            'nombreUnidadMedida' => $this->faker->randomElement($array = array (
                'Kilogramo',
                'Gramo',
                'Unidad',
                'Saco',
                'Caja',
                'Malla',
             )),

            'softDelete'=>$this->faker->randomElement($array = array (false))
        ];
    }
}
