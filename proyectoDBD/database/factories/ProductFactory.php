<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //'nombreProducto'=>$this->faker->name,
            'nombreProducto' => $this->faker->randomElement($array = array (
                'Tomate',
                'Sandia',
                'Melon',
                'Kiwi',
                'Naranja',
                'Uva',
                'Papa',
                'Palta',
                'Aceitunas',
                'Cebollin',
                'Platano',
                'Arandanos',
                'Duraznos',
                'Apio',
                'Pepino',
                'Repollo',
                'Mango',
                'Choclo',
                'Jitomates',
                'Pera',
                'Manzana',
                'Melon Tuna',
                'Cebolla en escabeche',
                'Huevo blanco',
                'Huevo cafe',
                'Jengibre',
                'Zapallo Italiano',
                'Zapallo',
                'Lechuga',
                'Cebolla',
                'Pimenton Rojo',
                'Pimenton Verde',
                'Pimenton Amarillo',
                'Ajo',
                'Pescado: Reineta',
                'Pescado: Merluza',
                'Pescado: Salmon',
                'Pescado: Atun',
                'Pescado: Corvina',
                'Carne: Molida',
                'Carne: Plateada de vacuno',
                'Carne: Punta picana',
                'Carne: Lomo liso',
                'Carne: Lomo vetado',
                'Carne: Filete',
                'Charqui',
                'Pollo: Entero',
                'Pollo: Pechuga',
                'Pollo: Filetes',
                'Longaniza',
                'Salchicha',
             )),
            'precioProducto'=>$this->faker->numberBetween($min=500,$max=20000),
            'stockProducto'=>$this->faker->randomNumber($nbDigits = 4, $strict = false),
            'softDelete'=>$this->faker->randomElement($array = array (false)),

            //Foranea
            //'idCategoria'=>Category::factory()
            'idCategoria' => Category::all()->random()->id
        ];
    }
}
