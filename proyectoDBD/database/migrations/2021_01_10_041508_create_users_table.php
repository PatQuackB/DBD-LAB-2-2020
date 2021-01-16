<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');

            $table->string('rutUsuario');
            $table->string('nombreUsuario');
            $table->string('apellidoUsuario');
            $table->string('correoUsuario')->unique();
            $table->timestamp('correoUsuarioVerificado')->nullable();
            $table->string('contraseniaUsuario');
            $table->rememberToken();
            $table->boolean('softDelete');


            //Foranea de Calle
            $table->unsignedBigInteger('idCalle')->nullable();
            $table->foreign('idCalle')->references('id')->on('street_addresses');

            //Foranea de Rol
            $table->unsignedBigInteger('idRol')->nullable();
            $table->foreign('idRol')->references('id')->on('roles');

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
        Schema::dropIfExists('users');
    }
}
