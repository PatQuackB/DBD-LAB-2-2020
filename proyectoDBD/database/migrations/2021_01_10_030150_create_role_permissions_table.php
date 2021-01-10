<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_permissions', function (Blueprint $table) {
            $table->id('id');

            #Foranea de Rol
            $table->unsignedBigInteger('idRol');
            $table->foreign('idRol')->references('id')->on('roles');

            #Foranea de Permiso
            $table->unsignedBigInteger('idPermiso');
            $table->foreign('idPermiso')->references('id')->on('permissions');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_permissions');
    }
}
