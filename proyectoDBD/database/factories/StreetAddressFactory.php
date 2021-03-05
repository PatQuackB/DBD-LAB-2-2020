<?php

namespace Database\Factories;

use App\Models\StreetAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class StreetAddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = StreetAddress::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreCalle'=>$this->faker->streetName,
            'softDelete'=>$this->faker->randomElement($array = array (false))
        ];
    }
}
