<?php

namespace Database\Factories;

use App\Models\UserStall;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserStallFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserStall::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Foranea 
            'idUsuario'=>User::Factory,
            'idPuesto'=>Stall::Factory
        ];
    }
}
