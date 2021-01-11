<?php

namespace Database\Factories;

use App\Models\Stall;
use Illuminate\Database\Eloquent\Factories\Factory;

class StallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombrePuesto'=>$this->faker->company,

            //Foranea
            'idFeria'=>Fair::Factory,
            'idCalle'=>StreetAddress::Factory
        ];
    }
}
