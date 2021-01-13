<?php

namespace Database\Factories;

use App\Models\RolePermission;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolePermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RolePermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //Foranea
            //'idPermiso'=>Permission::factory(),
            'idPermiso' => Permission::all()->random()->id,
            //'idRol'=>Role::factory()
            'idRol' => Role::all()->random()->id
        ];
    }
}
