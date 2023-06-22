<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role-usuario', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');//Llave foranea a usuario
            $table->unsignedBigInteger('id_roles');//Llave foranea a roles
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_roles')->references('id')->on('roles');
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
        Schema::dropIfExists('role-usuario');
    }
};
