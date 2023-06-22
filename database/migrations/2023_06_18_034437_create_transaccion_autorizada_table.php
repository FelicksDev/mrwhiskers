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
        Schema::create('transaccion_autorizada', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_rol");
            $table->unsignedBigInteger("id_transaccion");
            $table->foreign('id_rol')->references('id')->on('roles');
            $table->foreign('id_transaccion')->references('id')->on('transaccion');
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
        Schema::dropIfExists('transaccion_autorizada');
    }
};
