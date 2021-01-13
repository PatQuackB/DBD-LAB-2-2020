<?php

namespace Database\Factories;

use App\Models\DeliveryOrder;
use App\Models\StreetAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeliveryOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estadoDespacho'=>$this->faker->numberBetween($min=0,$max=3),
            'tipoDespacho'=>$this->faker->numberBetween($min=0,$max=1),

            //Foranea
            //'idCalle'=>StreetAddress::factory()
            'idCalle' => StreetAddress::all()->random()->id
        ];
    }
}
