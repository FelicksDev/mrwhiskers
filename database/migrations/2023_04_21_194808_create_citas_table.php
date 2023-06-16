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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();
            $table->string('fecha');
            $table->string('hora');
            $table->string('descripcion')->nullable();
            //$table->unsignedBigInteger('id_mascota');//Llave foranea mascotas
            $table->unsignedBigInteger('id_cliente');//Llave foranea a cliente
            $table->unsignedBigInteger('id_tipo_de_cita');//Llave foranea a tipos de citas
            $table->unsignedBigInteger('id_estado_de_cita')->default(1);//Llave foranea a estados de citas
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->foreign('id_tipo_de_cita')->references('id')->on('tipo_de_cita');
            $table->foreign('id_estado_de_cita')->references('id')->on('estado_de_citas');
            $table->timestamps();
            //$table->foreign('id_mascota')->references('id')->on('mascotas');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('citas');
    }
};
