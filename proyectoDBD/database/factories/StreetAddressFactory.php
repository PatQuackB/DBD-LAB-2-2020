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
            //'nombreCalle'=>$this->faker->streetName,

            'nombreCalle' => $this->faker->randomElement($array = array (
                'El belloto',
                'Pasaje esmeralda',
                'Vargas fontecilla',
                'Jose joaquin perez',
                'Holanda',
                'Matucana',
                'Av Libertador bernardo ohiggins',
                'Ecuador',
                'General Velasquez',
                'Andes de violeta parra',
                'Campo amor',
                'Irarrazabal',
                'Vicuña Mackena',
                'Av providencia',
                'Av nueva providencia',
                'San carlos de apoquindo',
                'Tobalaba',
                'Ladrillero',
                'Av las nieves',
                'Notato Coo',
                'Paseo Lastarria',
                'Paseo Ahumada',
                'Av Vitacura',
                'Av Las condes',
                'Martines de Rozas',
                'Chacabuco',
                'Mapocho',
                'Estado',
                'Av San pablo',
                'Santo domingo',
                'Santo sabado',
                'Av San nicolas',
                'Martines de Tulipanes',
                'Av Las avenidas',
                'Paseo los gatos',
                'Av Aquino toy',
                'Pje Los perros bravos',
                'Av Civil Wars',
                'Los Arbolitos',
                'Barrio Chino',
                'Plaza Sesamo',
                'Los Pajaritos',
                'Francia',
                'Paris',
                'Av. Las Motocierras',
                'Macul',
                'El Libano',
             )),


            'softDelete'=>$this->faker->randomElement($array = array (false))
        ];
    }
}
