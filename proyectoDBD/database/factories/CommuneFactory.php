<?php

namespace Database\Factories;

use App\Models\Region;
use App\Models\Commune;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommuneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Commune::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombreComuna'=>$this->faker->city,
            'softDelete'=>$this->faker->randomElement($array = array (false)),

            //Foranea
            //'idRegion'=>Region::factory()
            'idRegion' => Region::all()->random()->id
        ];
    }
}
