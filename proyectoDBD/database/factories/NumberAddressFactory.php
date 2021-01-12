<?php

namespace Database\Factories;

use App\Models\NumberAddress;
use App\Models\Commune;
use App\Models\StreetAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class NumberAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NumberAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numeroCalle'=>$this->faker->buildingNumber,

            //Foraneas
            'idComuna'=>Commune::factory(),
            'idCalle'=>StreetAddress::factory()
        ];
    }
}
