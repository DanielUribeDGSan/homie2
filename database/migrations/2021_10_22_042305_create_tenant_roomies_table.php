<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantRoomiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenant_roomies', function (Blueprint $table) {
            $table->id();
            $table->string('transaction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('compartira_renta');
            $table->string('name');
            $table->string('last_name');
            $table->string('identificacion_oficial');
            $table->string('email');
            $table->string('phone');
            $table->date('fecha_de_nacimiento');
            $table->string('rfc');
            $table->string('direccion_vivienda_actual');
            $table->json('documentacion');
            $table->string('historial_crediticio');


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
        Schema::dropIfExists('tenant_roomies');
    }
}
