<?php

namespace Database\Factories;

use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\DeliveryOrder;

class PaymentMethodFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentMethod::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'estadoPago'=>$this->faker->numberBetween($min=0,$max=1),
            'tipoTarjeta'=>$this->faker->numberBetween($min=0,$max=1),
            'nombreBanco'=>$this->faker->creditCardType,
            'ultimosNumerosTarjeta'=>$this->faker->text,
            'mesVencimiento'=>$this->faker->numberBetween($min=1,$max=12),
            'anioVencimiento'=>$this->faker->numberBetween($min=0,$max=99),
            'softDelete'=>$this->faker->randomElement($array = array (false)),

            //Foranea
            //'idDespacho'=>DeliveryOrder::factory()
            'idDespacho' => DeliveryOrder::all()->random()->id
        ];
    }
}
