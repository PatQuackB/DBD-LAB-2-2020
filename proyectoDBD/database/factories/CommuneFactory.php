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
            'nombreComuna' => $this->faker->randomElement($array = array(
                'Alto Hospicio',
                'Iquique',
                'Camiña',
                'Colchane',
                'Tocopilla',
                'Mejillones',
                'Sierra Gorda',
                'Taltal',
                'Chañaral',
                'Caldera',
                'Tierra Amarilla',
                'Alto del Carmen',
                'La Serena',
                'Paihuano',
                'Vicuña',
                'Combarbalá',
                'Los Ándes',
                'Santo Domingo',
                'Algarrobo',
                'Villa Alemana',
                'Graneros',
                'Machalí',
                'Peumo',
                'Rancagua',
                'Linares',
                'Villa Alegre',
                'Longaví',
                'Parral',
                'Los Álamos',
                'Cabrero',
                'Los Ángeles',
                'Tucapel',
                'Temuco',
                'Gorbea',
                'Carahue',
                'Freire',
                'Ancud',
                'Puerto Montt',
                'Puerto Varas',
                'Osorno',
                'Aysén',
                'Tortel',
                'Lago Verde',
                'Chile Chico',
                'Punta Arenas',
                'Natales',
                'Torres del Paine',
                'Cabo de Hornos',
                'Santiago',
                'Quinta Normal',
                'Pudahuel',
                'Estación Central',
                'Lago Ranco',
                'Río Bueno',
                'Corral',
                'Valdivia',
                'Arica',
                'General Lagos',
                'Putre',
                'Camarones',
                'Bulnes',
                'Chillán',
                'Quillón',
                'Quirihue',
            )),
            'softDelete' => $this->faker->randomElement($array = array(false)),

            //Foranea
            //'idRegion'=>Region::factory()
            'idRegion' => Region::all()->random()->id
        ];
    }
}
