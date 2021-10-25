<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->string('transaction');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('escrituras');
            $table->string('contrato_compra_venta');
            $table->string('poder_notarial');
            $table->string('comprobante_domicilio');
            $table->string('admite_mascotas');
            $table->string('tiene_estacionamiento');
            $table->string('servicios');
            $table->string('esta_amueblado');
            $table->string('identificacion_oficial');
            $table->string('metodo_pago');
            $table->string('puede_facturar');
            $table->string('precio_propiedad');
            $table->string('direccion');
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
        Schema::dropIfExists('owners');
    }
}
