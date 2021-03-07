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
            //'nombrePuesto'=>$this->faker->company,
            'nombrePuesto' => $this->faker->randomElement($array = array (
                'Verdulerìa Schnake',
                'Verdulerìa Cañoles',
                'Verdulerìa Bustos',
                'Verdulerìa Montenegro',
                'Carnicería Schnake',
                'Carnicería Cañoles',
                'Carnicería Bustos',
                'Carnicería Montenegro',
                'Donde Simon',
                'Donde Patricio',
                'Donde Nicolas',
                'Donde Maria Jesus',
                'Frutas y verduras Patricio Bustos',
                'Frutas y verduras Simon Montenegro',
                'Frutas y verduras Nicolas Schnake',
                'Frutas y verduras Maria Jesus Cañoles',
                'El gran Jorge',
                'La gran Gummy',
                'El gran Isaac',
                'La gran Cata',
                'La gran Romina',
                'El gran Cristian',
                'Minimarket Ayudantes',
                'Mall Carolina Bonanic',
                'USACH: Un Sitio Al CHancheo',
                'La gloriosa',
                'Papas fritas de electrica',
                'Papas fritas de Heisenberg',
                'Vamos a la L',
                'Pizzas XL',
                'HandRolls a Luca',

             )),
            'softDelete'=>$this->faker->randomElement($array = array (false)),
            //Foranea
            //'idFeria'=>Fair::factory(),
            'idFeria' => Fair::all()->random()->id,
            //'idCalle'=>StreetAddress::factory()
            'idCalle' => StreetAddress::all()->random()->id
        ];
    }
}
