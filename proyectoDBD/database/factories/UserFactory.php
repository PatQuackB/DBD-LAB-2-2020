<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\StreetAddress;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'rutUsuario'=>$this->faker->unique()->localIpv4,
            'nombreUsuario'=>$this->faker->firstName($gender = null),
            'apellidoUsuario'=>$this->faker->lastName($gender = null),
            'oculto'=>$this->faker->boolean,
            'correoUsuario'=>$this->faker->unique()->safeEmail,
            'correoUsuarioVerificado'=>$this->faker->dateTime($max = 'now', $timezone = null),
            'contraseniaUsuario'=>$this->faker->password,
            
            //Foranea
            //'idCalle'=>StreetAddress::factory(),
            'idCalle' => StreetAddress::all()->random()->id,
            //'idRol'=>Role::factory()
            'idRol' => Role::all()->random()->id
        ];
    }
}
