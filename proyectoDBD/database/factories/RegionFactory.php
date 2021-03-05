<?php

namespace Database\Factories;

use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Region::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
             'nombreRegion'=>$this->faker->state
             /*'nombreRegion' => $this->faker->randomElement($array = array (
                'I Region de Tarapaca',
                'II Region de Antofagasta',
                'III Region de Atacama',
                'IV Region de Coquimbo',
                'V Region de Valparaiso',
                'VI Region del Libertador General Bernardo OHiggins',
                'VII Region del Maule',
                'VIII Region del Biobio',
                'IX Region de La Araucania',
                'X Region de Los Lagos',
                'XI Region Aysen del General Carlos Ibañez del Campo',
                'XII Region de Magallanes y Antartica Chilena',
                'XIII Region Metropolitana de Santiago',
                'XIV Region de Los Rios',
                'XV Region de Arica y Parinacota',
                'XVI Region de Ñuble',
             ))*/,
             'softDelete'=>$this->faker->randomElement($array = array (false))
        ];
    }
}
