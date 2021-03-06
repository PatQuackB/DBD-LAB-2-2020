<?php

namespace Database\Factories;

use App\Models\PurchaseOrder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseOrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PurchaseOrder::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numeroCompra'=>$this->faker->unique()->uuid,
            'fechaCompra'=>$this->faker->dateTime($max = 'now', $timezone = null),
            'montoTotal'=>$this->faker->numberBetween($min=1000,$max=40000),
            'softDelete'=>$this->faker->randomElement($array = array (false)),

            //Foranea
            //'idUsuario'=>User::factory()
            'idUsuario' => User::all()->random()->id
        ];
    }
}
