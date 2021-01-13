<?php

namespace Database\Factories;

use App\Models\PaymentMethodUser;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentMethodUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PaymentMethodUser::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Foranea
            //'idPago'=>PaymentMethod::factory(),
            'idPago' => PaymentMethod::all()->random()->id,
            //'idUsuario'=>User::factory()
            'idUsuario' => User::all()->random()->id
        ];
    }
}
