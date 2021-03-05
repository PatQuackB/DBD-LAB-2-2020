<?php

namespace Database\Factories;

use App\Models\Stall;
use App\Models\StreetAddress;
use App\Models\Fair;
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
            'softDelete'=>$this->faker->randomElement($array = array (false)),
            //Foranea
            //'idFeria'=>Fair::factory(),
            'idFeria' => Fair::all()->random()->id,
            //'idCalle'=>StreetAddress::factory()
            'idCalle' => StreetAddress::all()->random()->id
        ];
    }
}
